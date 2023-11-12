<?php

namespace App\Http\Controllers;

use App\Functions\Mail as Mailer;
use Illuminate\Http\Request;
use App\Models\Request as _Request;
use App\Models\RequestItem;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class RequestController extends Controller
{
    public function index_view()
    {
        $data = _Request::with('Items')->orderBy('id', 'DESC')->get();
        return view('request.index', compact('data'));
    }

    public function scene_view(Request $Request, $id)
    {
        $data = _Request::with('Items')->findorfail($id);
        return view('request.scene', compact('data'));
    }

    public function store_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'quantity' => ['required'],
            'product' => ['required'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Current = _Request::create($Request->all());

        foreach ($Request->product as $key => $value) {
            RequestItem::create([
                'request' => $Current->id,
                'product' => $Request->product[$key],
                'quantity' => $Request->quantity[$key],
            ]);
        }

        Mailer::info($Request->email, [
            'subject' => ucwords(__('Request quotation')),
            'content' => __('We recived your request. We will send you the quotation via mail as soon as possible.'),
        ]);

        Mailer::info(env('MAIL_CONTACT_ADDRESS'), [
            'subject' => ucwords(__('New quotation request')),
            'content' => __('New quotation request available. Check it out.'),
        ]);

        return Redirect::back()->with([
            'message' => __('Ordered successfully'),
            'type' => 'success',
            'clean' => true,
        ]);
    }
}
