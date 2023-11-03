<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Functions\Mail as Mailer;
use App\Models\Product;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Models\QuotationItem;
use App\Models\Request as _Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class QuotationController extends Controller
{
    public function index_view()
    {
        $data = Quotation::with('Items')->orderBy('id', 'DESC')->get();
        return view('quotation.index', compact('data'));
    }

    public function store_view(Request $Request)
    {
        $data = null;
        if ($Request->target) {
            $data = _Request::with('Items')->findorfail($Request->target);
        }
        $products = Product::orderBy('id', 'DESC')->get();
        return view('quotation.store', compact('products', 'data'));
    }

    public function patch_view($id)
    {
        $data = Quotation::with('Items')->findorfail($id);
        $products = Product::orderBy('id', 'DESC')->get();
        return view('quotation.patch', compact('data', 'products'));
    }

    public function scene_view(Request $Request, $id)
    {
        $data = Quotation::with('Items')->findorfail($id);
        return view('quotation.scene', compact('data'));
    }

    public function store_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'reference' => ['required', 'string'],
            'charge' => ['required', 'string'],
            'currency' => ['required', 'string'],
            'quantity' => ['required'],
            'product' => ['required'],
            'price' => ['required'],
            'unit' => ['required'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Current = Quotation::create($Request->all());

        foreach ($Request->product as $key => $value) {
            QuotationItem::create([
                'quotation' => $Current->id,
                'product' => $Request->product[$key],
                'unit' => $Request->unit[$key],
                'price' => $Request->price[$key],
                'quantity' => $Request->quantity[$key],
                'status' => Core::states()[0],
            ]);
        }

        Mailer::info($Request->email, [
            'subject' => ucwords(__('Request quotation')),
            'content' => __('You can view and print your quotation by clicking the link below'),
            'ref' => $Current->reference
        ]);

        return Redirect::route('views.quotations.store')->with([
            'message' => __('Created successfully'),
            'type' => 'success',
            'clean' => true,
        ]);
    }

    public function patch_action(Request $Request, $id)
    {
        $validator = Validator::make($Request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'reference' => ['required', 'string'],
            'charge' => ['required', 'string'],
            'currency' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Current = Quotation::findorfail($id);

        if ($Request->delete && !$Request->product && $Current->Items->count() == count($Request->delete)) {
            return Redirect::back()->withInput()->with([
                'message' => 'The product field is required.',
                'type' => 'error'
            ]);
        }

        QuotationItem::where('quotation', $Current->id)->delete();

        $Current->update($Request->all());

        foreach ($Request->product as $key => $value) {
            QuotationItem::create([
                'quotation' => $Current->id,
                'product' => $Request->product[$key],
                'unit' => $Request->unit[$key],
                'price' => $Request->price[$key],
                'quantity' => $Request->quantity[$key],
                'status' => Core::states()[0],
            ]);
        }

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success',
            'clean' => true,
        ]);
    }

    public function clear_action($id)
    {
        Quotation::findorfail($id)->delete();

        return Redirect::route('views.quotations.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
