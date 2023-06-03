<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('message index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $messages = Message::latest()->get();
        return view('backend.message.index', get_defined_vars());
    }

    public function show($id)
    {
        abort_if(Gate::denies('message show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $message = Message::findOrFail($id);
        return view('backend.message.show', get_defined_vars());
    }


    public function destroy($id)
    {
        abort_if(Gate::denies('message delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            Message::find($id)->delete();
            alert()->success(__('messages.success'));
            return redirect()->route('backend.message.index');
        } catch (\Exception $e) {
            alert()->error(__('messages.error'));
            return redirect()->route('backend.message.index');
        }
    }
}
