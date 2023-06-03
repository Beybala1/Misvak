<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductTranslation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('products index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $products = Product::with('category')->latest()->get();
        return view('backend.products.index', get_defined_vars());
    }

    public function create()
    {
        abort_if(Gate::denies('products create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::latest()->get();
        return view('backend.products.create',get_defined_vars());
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('products create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $product = new Product();
            $product->image = upload('products', $request->file('image'));
            $product->category_id = $request->category_id;
            $product->save();
            foreach (active_langs() as $active_lang) {
                $translation = new ProductTranslation();
                $translation->title = $request->title[$active_lang->code];
                $translation->content = $request->content[$active_lang->code];
                $translation->alt = $request->alt[$active_lang->code];
                $translation->locale = $active_lang->code;
                $translation->product_id = $product->id;
                $translation->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.products.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.products.create'));
        }
    }

    public function edit($id)
    {
        abort_if(Gate::denies('products edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::latest()->get();
        $product = Product::findOrFail($id);
        return view('backend.products.edit', get_defined_vars());
    }

    public function update(Request $request, Product $product)
    {
        abort_if(Gate::denies('products edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            DB::transaction(function () use ($request, $product) {
                if ($request->hasFile('image')) {
                    unlink((public_path($product->image)));
                    $product->image = upload('Products', $request->file('image'));
                }
                $product->category_id = $request->category_id; 
                foreach (active_langs() as $lang) {
                    $product->translate($lang->code)->title = $request->title[$lang->code];
                    $product->translate($lang->code)->content = $request->content[$lang->code];
                    $product->translate($lang->code)->alt = $request->alt[$lang->code];
                }
                $product->save();
            });
            alert()->success(__('messages.success'));
            return redirect(route('backend.products.index'));
        } catch (Exception $e) {
            alert()->error(__('messages.error'));
            return redirect(route('backend.products.index'));
        }
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('products delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            unlink(Product::find($id)->image);
            Product::find($id)->delete();
            alert()->success(__('messages.success'));
            return redirect()->route('backend.products.index');
        } catch (\Exception $e) {
            alert()->error(__('messages.error'));
            return redirect()->route('backend.products.index');
        }
    }
}