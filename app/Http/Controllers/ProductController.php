<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Rules\FileRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index_view()
    {
        $data = Product::orderBy('id', 'DESC')->get();
        return view('product.index', compact('data'));
    }

    public function store_view()
    {
        $brands = Brand::orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('product.store', compact('categories', 'brands'));
    }

    public function patch_view($id)
    {
        $data = Product::findorfail($id);
        $brands = Brand::orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('product.patch', compact('data', 'categories', 'brands'));
    }

    public function store_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name' => ['required', 'string', 'unique:products'],
            'images' => ['required', new FileRule],
            'category' => ['required', 'integer'],
            'details' => ['required', 'string'],
            'status' => ['required', 'string'],
            'brand' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'unit' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Product = Product::create($Request->merge([
            'slug' => Core::slug($Request->name),
        ])->all());

        Core::files(Core::PRODUCT)->set($Request->file('images'), ['product', $Product->id]);

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function patch_action(Request $Request, $id)
    {
        $validator = Validator::make($Request->all(), [
            'name' => ['required', 'string', 'unique:products,name,' . $id],
            'category' => ['required', 'integer'],
            'details' => ['required', 'string'],
            'status' => ['required', 'string'],
            'brand' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'unit' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Product = Product::findorfail($id);

        if ($Request->delete && !$Request->hasFile('images') && $Product->Files->count() == count($Request->delete)) {
            return Redirect::back()->withInput()->with([
                'message' => 'The images field is required.',
                'type' => 'error'
            ]);
        }

        if ($Request->hasFile('images')) {
            Core::files(Core::PRODUCT)->set($Request->file('images'), ['product', $Product->id]);
        }

        if ($Request->delete) {
            foreach ($Request->delete as $delete) {
                Core::files(Core::PRODUCT)->del(['id', $delete]);
            }
        }

        if ($Product->name != $Request->name) {
            $Request->merge([
                'slug' => Core::slug($Request->name),
            ]);
        }

        $Product->update($Request->all());

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function clear_action($id)
    {
        $Product = Product::findorfail($id);
        Core::files(Core::PRODUCT)->del(['product', $Product->id]);
        $Product->delete();

        return Redirect::route('views.products.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
