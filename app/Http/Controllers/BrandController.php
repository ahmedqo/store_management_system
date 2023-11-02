<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Models\Brand;
use App\Rules\FileRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    public function index_view()
    {
        $data = Brand::orderBy('id', 'DESC')->get();
        return view('brand.index', compact('data'));
    }

    public function store_view()
    {
        return view('brand.store');
    }

    public function patch_view($id)
    {
        $data = Brand::findorfail($id);
        return view('brand.patch', compact('data'));
    }

    public function store_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name_en' => ['required', 'string', 'unique:brands'],
            'name_fr' => ['required', 'string', 'unique:brands'],
            'name_it' => ['required', 'string', 'unique:brands'],
            'name_ar' => ['required', 'string', 'unique:brands'],
            'image' => ['required', new FileRule]
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $file = Core::files(Core::BRAND)->set($Request->file('image'));
        Brand::create($Request->merge([
            'slug' => Core::slug($Request->name_en),
            'file' => $file
        ])->all());

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function patch_action(Request $Request, $id)
    {
        $validator = Validator::make($Request->all(), [
            'name_en' => ['required', 'string', 'unique:brands,name_en,' . $id],
            'name_fr' => ['required', 'string', 'unique:brands,name_fr,' . $id],
            'name_it' => ['required', 'string', 'unique:brands,name_it,' . $id],
            'name_ar' => ['required', 'string', 'unique:brands,name_ar,' . $id],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Brand = Brand::findorfail($id);

        if ($Brand->name != $Request->name) {
            $Request->merge([
                'slug' => Core::slug($Request->name_en),
            ]);
        }

        if ($Request->hasFile('image')) {
            Core::files(Core::BRAND)->del($Brand->file);
            $Request->merge([
                'file' => Core::files(Core::BRAND)->set($Request->file('image'))
            ]);
        }

        $Brand->update($Request->all());

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function clear_action($id)
    {
        $Brand = Brand::findorfail($id);
        Core::files(Core::BRAND)->del($Brand->file);
        $Brand->delete();

        return Redirect::route('views.brands.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
