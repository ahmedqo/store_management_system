<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home_view()
    {
        $brands = Brand::orderBy('id', 'DESC')->limit(20)->get();
        $products = Product::orderBy('id', 'DESC')->limit(8)->get();
        $categories = Category::orderBy('id', 'DESC')->limit(5)->get();

        $class = [
            'parent' => '',
            'children' => []
        ];

        if ($categories->count() == 3) {
            $class['parent'] = 'grid-cols-2 grid-rows-2';
            array_push($class['children'], 'aspect-video lg:aspect-[32/9]', 'aspect-video lg:aspect-none lg:row-span-2', 'aspect-[32/9] col-span-2 lg:col-span-1');
        }

        if ($categories->count() == 4) {
            $class['parent'] = 'grid-cols-2 lg:grid-cols-5';
            array_push($class['children'], 'aspect-video lg:col-span-2', 'aspect-video lg:aspect-[32/9] lg:col-span-3', 'aspect-video lg:aspect-[32/9] lg:col-span-3', 'aspect-video lg:col-span-2');
        }

        if ($categories->count() == 5) {
            $class['parent'] = 'grid-cols-2 lg:grid-cols-3 lg:grid-row-2';
            array_push($class['children'], 'aspect-video', 'aspect-video lg:aspect-none lg:row-span-2', 'col-span-2 lg:col-span-1 aspect-[32/9] lg:aspect-video', 'aspect-video', 'aspect-video');
        }

        return view('guest.home', compact('categories', 'brands', 'products', 'class'));
    }

    public function product_view(Request $Request, $slug)
    {
        $row = [];
        if ($Request->category) {
            $Category = Category::where('slug', $Request->category)->first();
            if ($Category) {
                array_push($row, [__("Categories"), route('views.guest.categories')]);
                array_push($row, [ucwords($Category->name), route('views.guest.products', [
                    'category' => $Category->slug
                ])]);
            }
        }

        if ($Request->brand && count($row) == 0) {
            $Brand = Brand::where('slug', $Request->brand)->first();
            if ($Brand) {
                array_push($row, [__("Brands"), route('views.guest.brands')]);
                array_push($row, [ucwords($Brand->name), route('views.guest.products', [
                    'brand' =>  $Brand->slug
                ])]);
            }
        }

        if (count($row) == 0) {
            array_push($row, [__("Products"), route('views.guest.products')]);
        }

        $data = Product::where('slug', $slug)->first();
        $row = array_merge([[__('Home'), route('views.guest.home')]], $row, [[ucwords($data->name), route('views.guest.product', $data->slug)]]);

        return view('guest.product', compact('data', 'row'));
    }

    public function products_view(Request $Request)
    {
        $row = [
            [__('Home'), route('views.guest.home')]
        ];
        $img = null;
        $tag = null;
        $id = null;
        if ($Request->category) {
            $Category = Category::where('slug', $Request->category)->first();
            if ($Category) {
                $img = Core::files(Core::CATEGORY)->get($Category->file);
                $id = $Category->id;
                $tag = 'category';
                array_push($row, [__("Categories"), route('views.guest.categories')]);
                array_push($row, [ucwords($Category->name), route('views.guest.products', [
                    'category' => $Category->slug
                ])]);
            }
        }

        if ($Request->brand) {
            $Brand = Brand::where('slug', $Request->brand)->first();
            if ($Brand) {
                $img = Core::files(Core::BRAND)->get($Brand->file);
                $id = $Brand->id;
                $tag = 'brand';
                array_push($row, [__("Brands"), route('views.guest.brands')]);
                array_push($row, [ucwords($Brand->name), route('views.guest.products', [
                    'brand' => $Brand->slug
                ])]);
            }
        }

        array_push($row, [__("Products"), route('views.guest.products')]);

        $categories = Category::get();
        $data = Product::query();
        if ($tag && $id) $data = $data->where($tag, $id);
        $data = $data->orderBy('id', 'DESC')->get();

        return view('guest.products', compact('data', 'categories', 'row', 'img'));
    }

    public function categories_view()
    {
        $data = Category::orderBy('id', 'DESC')->get();
        return view('guest.categories', compact('data'));
    }

    public function brands_view()
    {
        $data = Brand::orderBy('id', 'DESC')->get();
        return view('guest.brands', compact('data'));
    }
}
