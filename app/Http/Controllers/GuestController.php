<?php

namespace App\Http\Controllers;

use App\Functions\{
    Mail as Mailer,
    Core
};
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Quotation;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class GuestController extends Controller
{
    public function home_view()
    {
        $brands = Brand::orderBy('id', 'DESC')->limit(20)->get();
        $products = Product::with('Files')->orderBy('id', 'DESC')->limit(8)->get();
        $categories = Category::orderBy('id', 'DESC')->limit(5)->get();
        $slides = Slide::orderBy('id', 'DESC')->get();

        $class = [
            'parent' => '',
            'children' => []
        ];

        if ($categories->count() == 3) {
            $class['parent'] = 'grid-cols-2 grid-rows-2';
            array_push($class['children'], 'aspect-[12/9] lg:aspect-[32/9]', 'aspect-[12/9] lg:aspect-none lg:row-span-2', 'aspect-[32/9] col-span-2 lg:col-span-1');
        }

        if ($categories->count() == 4) {
            $class['parent'] = 'grid-rows-1 grid-cols-2 lg:grid-cols-5';
            array_push($class['children'], 'aspect-[12/9] lg:col-span-2', 'aspect-[12/9] lg:aspect-[32/9] lg:col-span-3', 'aspect-[12/9] lg:aspect-[32/9] lg:col-span-3', 'aspect-[12/9] lg:col-span-2');
        }

        if ($categories->count() == 5) {
            $class['parent'] = 'grid-rows-1 grid-cols-2 lg:grid-cols-3 lg:grid-row-2';
            array_push($class['children'], 'aspect-[12/9]', 'aspect-[12/9] lg:aspect-none lg:row-span-2', 'col-span-2 lg:col-span-1 aspect-[11/4.0165] lg:aspect-[12/9]', 'aspect-[12/9]', 'aspect-[12/9]');
        }

        return view('guest.home', compact('slides', 'categories', 'brands', 'products', 'class'));
    }

    public function product_view(Request $Request, $slug)
    {
        $data = Product::with('Files')->where('slug', $slug)->first();
        Core::views($data->id);
        $row = [
            [__('Home'), route('views.guest.home')],
            [__("Products"), route('views.guest.products')],
            [ucwords($data->name), route('views.guest.product', $data->slug)]
        ];

        return view('guest.product', compact('data', 'row'));
    }

    public function products_view(Request $Request)
    {
        $row = [
            [__('Home'), route('views.guest.home')]
        ];
        $data = Product::with('Files');
        $img = null;

        if ($Request->search) {
            $data = $data->search($Request->search);
            array_push($row, [__("Search")]);
        }

        if ($Request->category) {
            $Category = Category::where('slug', $Request->category)->first();
            if ($Category) {
                $img = Core::files(Core::CATEGORY)->get($Category->file);
                $data = $data->where('category', $Category->id);
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
                $data = $data->where('brand', $Brand->id);
                array_push($row, [__("Brands"), route('views.guest.brands')]);
                array_push($row, [ucwords($Brand->name), route('views.guest.products', [
                    'brand' => $Brand->slug
                ])]);
            }
        }

        array_push($row, [__("Products"), route('views.guest.products')]);

        $categories = Category::get();
        $data = $data->orderBy('id', 'DESC')->get();

        return view('guest.products', compact('data', 'categories', 'row', 'img'));
    }

    public function categories_view()
    {
        $row = [
            [__('Home'), route('views.guest.home')],
            [__('Categories'), route('views.guest.categories')],
        ];
        $data = Category::orderBy('id', 'DESC')->get();

        return view('guest.categories', compact('data', 'row'));
    }

    public function brands_view()
    {
        $row = [
            [__('Home'), route('views.guest.home')],
            [__('Brands'), route('views.guest.brands')]
        ];
        $data = Brand::orderBy('id', 'DESC')->get();

        return view('guest.brands', compact('data', 'row'));
    }

    public function cart_view()
    {
        $row = [
            [__('Home'), route('views.guest.home')],
            [__('Request'), route('views.guest.cart')]
        ];
        return view('guest.cart', compact('row'));
    }

    public function quote_view(Request $Request, $ref)
    {
        $data = Quotation::with('Items')->where('reference', $ref)->first();
        return view('guest.quote', compact('data'));
    }

    public function contact_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Mailer::raw([
            'name' => $Request->name,
            'from' => $Request->email,
            'to' => env('MAIL_CONTACT_ADDRESS'),
            'subject' => ucwords(__('New contact mail')),
            'content' => __('Name') . ': ' . $Request->name . PHP_EOL . __('Phone') . ': ' . $Request->phone . PHP_EOL . PHP_EOL . $Request->message,
        ]);

        return Redirect::back()->with([
            'message' => __('Sent successfully'),
            'type' => 'success'
        ]);
    }
}
