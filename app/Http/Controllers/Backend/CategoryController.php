<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('category index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::latest()->get();
        return view('backend.category.index', get_defined_vars());
    }

    public function create()
    {
        abort_if(Gate::denies('category create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.category.create');
    }


    public function store(Request $request)
    {
        abort_if(Gate::denies('category create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $category = new Category();
            $category->save();
            foreach (active_langs() as $active_lang) {
                $translation = new CategoryTranslation();
                $translation->title = $request->title[$active_lang->code];
                $translation->locale = $active_lang->code;
                $translation->category_id = $category->id;
                $translation->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.category.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.category.index'));
        }
    }

    public function edit($id)
    {
        abort_if(Gate::denies('category edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category = Category::findOrFail($id);
        return view('backend.category.edit', get_defined_vars());
    }

    public function update(Request $request, Category $category)
    {
        abort_if(Gate::denies('category edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            DB::transaction(function () use ($request, $category) {
                foreach (active_langs() as $lang) {
                    $category->translate($lang->code)->title = $request->title[$lang->code];
                }
                $category->save();
            });
            alert()->success(__('messages.success'));
            return redirect(route('backend.category.index'));
        } catch (Exception $e) {
            alert()->error(__('messages.error'));
            return redirect(route('backend.category.index'));
        }
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('category delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            Category::find($id)->delete();
            alert()->success(__('messages.success'));
            return redirect()->route('backend.category.index');
        } catch (\Exception $e) {
            alert()->error(__('messages.error'));
            return redirect()->route('backend.category.index');
        }
    }
}