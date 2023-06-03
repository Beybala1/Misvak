<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutTranslation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('about index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $abouts = About::latest()->get();
        return view('backend.about.index', get_defined_vars());
    }

    public function edit($id)
    {
        abort_if(Gate::denies('about edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $about = About::findOrFail($id);
        return view('backend.about.edit', get_defined_vars());
    }

    public function update(Request $request, About $about)
    {
        abort_if(Gate::denies('about edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            DB::transaction(function () use ($request, $about) {
                if ($request->hasFile('image')) {
                    unlink((public_path($about->image)));
                    $about->image = upload('Abouts', $request->file('image'));
                }
                foreach (active_langs() as $lang) {
                    $about->translate($lang->code)->title = $request->title[$lang->code];
                    $about->translate($lang->code)->content = $request->content[$lang->code];
                    $about->translate($lang->code)->alt = $request->alt[$lang->code];
                }
                $about->save();
            });
            alert()->success(__('messages.success'));
            return redirect(route('backend.about.index'));
        } catch (Exception $e) {
            alert()->error(__('messages.error'));
            return redirect(route('backend.about.index'));
        }
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('about delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            unlink(About::find($id)->image);
            About::find($id)->delete();
            alert()->success(__('messages.success'));
            return redirect()->route('backend.about.index');
        } catch (\Exception $e) {
            alert()->error(__('messages.error'));
            return redirect()->route('backend.about.index');
        }
    }
}