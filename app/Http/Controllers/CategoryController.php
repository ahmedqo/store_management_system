<?php

namespace App\Http\Controllers;


use App\Functions\Core;
use App\Models\Category;
use App\Rules\FileRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index_view()
    {
        $data = Category::orderBy('id', 'DESC')->get();
        return view('category.index', compact('data'));
    }

    public function store_view()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('category.store', compact('categories'));
    }

    public function patch_view($id)
    {
        $data = Category::findorfail($id);
        $categories = Category::where('id', '!=', $id)->orderBy('id', 'DESC')->get();
        return view('category.patch', compact('data', 'categories'));
    }

    public function store_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name_en' => ['required', 'string', 'unique:categories'],
            'name_fr' => ['required', 'string', 'unique:categories'],
            'name_it' => ['required', 'string', 'unique:categories'],
            'name_ar' => ['required', 'string', 'unique:categories'],
            'image' => ['required', new FileRule]
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $file = Core::files(Core::CATEGORY)->set($Request->file('image'));
        Category::create($Request->merge([
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
            'name_en' => ['required', 'string', 'unique:categories,name_en,' . $id],
            'name_fr' => ['required', 'string', 'unique:categories,name_fr,' . $id],
            'name_it' => ['required', 'string', 'unique:categories,name_it,' . $id],
            'name_ar' => ['required', 'string', 'unique:categories,name_ar,' . $id],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Category = Category::findorfail($id);

        if ($Category->name != $Request->name) {
            $Request->merge([
                'slug' => Core::slug($Request->name_en),
            ]);
        }

        if ($Request->hasFile('image')) {
            Core::files(Core::CATEGORY)->del($Category->file);
            $Request->merge([
                'file' => Core::files(Core::CATEGORY)->set($Request->file('image'))
            ]);
        }

        $Category->update($Request->all());

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function clear_action($id)
    {
        $Category = Category::findorfail($id);
        Core::files(Core::CATEGORY)->del($Category->file);
        $Category->delete();

        return Redirect::route('views.categories.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
