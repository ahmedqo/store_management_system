<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Models\Product;
use App\Models\ProductViews;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\Slide;
use App\Models\Request as _Request;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CoreController extends Controller
{
    public function index_view()
    {
        $startDate = Carbon::now()->startOfWeek(Carbon::SUNDAY);
        $endDate = Carbon::now()->endOfWeek(Carbon::SATURDAY);

        $days = [];
        $days[ucwords(__('sunday'))] = 0;
        $days[ucwords(__('monday'))] = 0;
        $days[ucwords(__('tuesday'))] = 0;
        $days[ucwords(__('wednesday'))] = 0;
        $days[ucwords(__('thursday'))] = 0;
        $days[ucwords(__('friday'))] = 0;
        $days[ucwords(__('saturday'))] = 0;

        $products = Product::all()->count();
        $requests = _Request::whereBetween('created_at', [$startDate, $endDate])->get()->count();
        $quotations = Quotation::whereBetween('created_at', [$startDate, $endDate])->get()->count();

        $total = Quotation::whereBetween('created_at', [$startDate, $endDate])->get()->reduce(function ($carry, $quote) {
            return $carry + ($quote->Total() + $quote->Charge());
        }, 0);

        Quotation::whereBetween('created_at', [$startDate, $endDate])->get()
            ->groupBy(function ($quotation) {
                return $quotation->created_at->format('l');
            })
            ->map(function ($group) {
                return $group->sum(function ($quote) {
                    return $quote->Total() + $quote->Charge();
                });
            })->each(function ($item, $key) use (&$days) {
                $it = ucwords(__(strtolower($key)));
                $days[$it] = $item;
            });


        $views = ProductViews::with('Product')->whereBetween('updated_at', [$startDate, $endDate])->get()
            ->groupBy('product')->map(function ($group) {
                $group->views = $group->count();
                $group->Product = $group->first()->Product;
                return $group;
            });

        $days = json_encode($days);

        $sells = QuotationItem::with('Product')->whereBetween('created_at', [$startDate, $endDate])->get()
            ->groupBy('product')->map(function ($group) {
                $group->sells = $group->reduce(function ($carry, $item) {
                    return $carry + $item->quantity;
                }, 0);
                $group->Product = $group->first()->Product;
                return $group;
            });

        return view('core.index', compact('products', 'requests', 'quotations', 'total', 'days', 'views', 'sells'));
    }

    public function patch_view()
    {
        $data = Slide::orderBy('id', 'DESC')->get();
        return view('core.patch', compact('data'));
    }

    public function patch_action(Request $Request)
    {
        if ($Request->delete && !$Request->hasFile('images') && Slide::count() == count($Request->delete)) {
            return Redirect::back()->withInput()->with([
                'message' => 'The images field is required.',
                'type' => 'error'
            ]);
        }

        if ($Request->hasFile('images')) {
            Core::files(Core::SLIDE)->set($Request->file('images'), []);
        }

        if ($Request->delete) {
            foreach ($Request->delete as $delete) {
                Core::files(Core::SLIDE)->del(['id', $delete]);
            }
        }

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }
}
