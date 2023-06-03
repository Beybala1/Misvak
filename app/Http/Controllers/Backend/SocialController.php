<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SocialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('social index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $socials = Social::latest()->get();
        return view('backend.social.index', get_defined_vars());
    }

    public function create()
    {
        abort_if(Gate::denies('social create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.social.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('social create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            Social::create([
                'icon'=>$request->icon,
                'link'=>$request->link,
            ]);
            alert()->success(__('messages.success'));
            return redirect(route('backend.social.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.social.index'));
        }
    }

    public function edit($id)
    {
        abort_if(Gate::denies('social edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $social = Social::findOrFail($id);
        return view('backend.social.edit', get_defined_vars());
    }

    public function update(Request $request, Social $social)
    {
        abort_if(Gate::denies('social edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $social->update([
                'icon'=>$request->icon,
                'link'=>$request->link,
            ]);
            alert()->success(__('messages.success'));
            return redirect(route('backend.social.index'));
        } catch (Exception $e) {
            alert()->error(__('messages.error'));
            return redirect(route('backend.social.index'));
        }
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('social delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            Social::find($id)->delete();
            alert()->success(__('messages.success'));
            return redirect()->route('backend.social.index');
        } catch (\Exception $e) {
            alert()->error(__('messages.error'));
            return redirect()->route('backend.social.index');
        }
    }
}