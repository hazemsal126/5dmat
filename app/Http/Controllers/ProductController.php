<?php

namespace App\Http\Controllers;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    /*
    $product_category,
    $product_category_id,
    $general_sort,
    $price,
    $product_sort,
    $rating,
    $frequent_sort,
    $gift_sort,
    $shipping_sort
    */
    public function filters(
        Request $request,
        $product_category=null,
        $product_category_id=null,
        $general_sort = null,
        $price = null,
        $priceValueRangeFrom = null,
        $priceValueRangeTo = null,
        $product_sort = null,
        $rating = null,
        $gift_sort = null,
        $shipping_sort = null
    ) {
        if ($request->isMethod('post')) {
            // //mostDonation
            //recently-added
            //fully-funded
            $project_filters_input = request('project_filters');
            //high_prices
            //low_prices
            $price_filters_input = request('price_filters');
            $price_range_start_input = request('price_range_start');
            $price_range_end_input = request('price_range_end');
            $product_type_input = request('product_type') ?? [
                $product_category_id
            ];
            if (!empty($product_type_input)) {
                $product_type_input = implode(',', $product_type_input ?? []);
            }
            $product_evaluation_input = request('product_evaluation');
            $gift_type_input = request('gift_type');
            if (!empty($gift_type_input)) {
                $gift_type_input = implode(',', $gift_type_input ?? []);
            }
            $shipping_input = request('shipping');
            if (!empty($shipping_input)) {
                $shipping_input = implode(',', $shipping_input ?? []);
            }
            return redirect(
                route('product-filters', [
                    $product_category ?? 'all',
                    $product_category_id ?? 'all',
                    $project_filters_input ?? 'all',
                    $price_filters_input ?? 'all',
                    $price_range_start_input ?? 'all',
                    $price_range_end_input ?? 'all',
                    $product_type_input ?? 'all',
                    $product_evaluation_input ?? 'all',
                    $gift_type_input ?? 'all',
                    $shipping_input ?? 'all'
                ])
            );
        }

        $products = \App\Models\Product::whereHas('type', function ($q) use (
            $product_category_id,
            $product_sort
        ) {
            if (!empty($product_category_id) && empty($product_sort)) {
                $q->Where('id', '=', $product_category_id);
            } elseif (!empty($product_sort)) {
                $q->WhereIn('id', explode(',', $product_sort));
            }
        });

        if ($rating && $rating != "all") {
            $products = $products->whereIn(
                'shipping_by',
                explode(',', $shipping_sort)
            );
        }
        if ($shipping_sort && $shipping_sort != "all") {
            $products = $products->whereIn(
                'shipping_by',
                explode(',', $shipping_sort)
            );
        }
        if ($gift_sort && $gift_sort != "all") {
            // dd(explode(',', $gift_sort));
            $products = $products->whereIn(
                'gift_type',
                explode(',', $gift_sort)
            );
        }
        $sorting = [];
        switch ($general_sort) {
            case 'mostDonation':
                $products = $products->orderBy('acquired_amount', 'desc');
                break;
            case 'recently-added':
                $products = $products->orderBy('id', 'desc');
                break;
            case 'fully-funded':
                $products = $products->whereRaw(
                    \DB::raw('target_amount = acquired_amount')
                );
                break;
            default:
                $products = $products->orderBy('id', 'desc');
                break;
        }
        $products = $products->paginate(12);
        // dd($products);
        $product_types = \App\Models\Product_type::all();
        $gift_type = \App\Models\GiftType::all();
        $shipping = \App\Models\ShippCom::all();
        $data = [
            "shipping" => $shipping,
            "gift_type" => $gift_type,
            "products" => $products,
            "product_types" => $product_types,
            "filters" => [
                "project_filters" => $general_sort ?? null,
                "price_filters" => $price ?? null,
                "price_range_start" => $priceValueRangeFrom ?? null,
                "price_range_end" => $priceValueRangeTo ?? null,
                "product_type" =>
                    explode(',', $product_sort ?? $product_category_id) ?? null,
                "product_evaluation" => $rating ?? null,
                "gift_type" => explode(',', $gift_sort ?? "") ?? null,
                "shipping" => explode(',', $shipping_sort ?? "") ?? null
            ]
        ];
        // dd($data);
        # code...
        if ($request->isMethod('post')) {
            $request->flash();
            return view("home.products.filters")->with($data);
        } else {
            return view("home.products.filters")->with($data);
        }
    }
    //
    public function details($ProductId)
    {
        # code...
        $product = \App\Models\Product::withCount('order_items')
            ->withCount('ratings')
            ->with('ratings.user')
            ->where('id', $ProductId)
            ->firstOrFail();
        $ratings = \App\ProductRating::where('product_id', $ProductId)
            ->select(\DB::raw('value, count(*) as total'))
            ->groupBy('value')
            ->get();
        $ratings_count = 0;
        $ratings_avg = 0;
        foreach ($ratings as $r) {
            $ratings_count += $r->total;
        }
        foreach ($ratings as $r) {
            $r->avg = $r->total / $ratings_count;
        }
        foreach ($ratings as $r) {
            $ratings_avg += $r->value * $r->avg;
        }
        $ratings_avg = number_format($ratings_avg, 0);
        $similarProducts = \App\Models\Product::where(
            'product_type',
            $product->product_type
        )
            ->where('id', '<>', $product->id)
            ->orderByRaw("RAND()")
            ->limit(4)
            ->get();

        $other_category = \App\Models\Product_type::where(
            'id',
            '<>',
            $product->product_type
        )
            ->orderByRaw("RAND()")
            ->firstOrFail();

        $other_products = \App\Models\Product::where(
            'product_type',
            $other_category->id
        )
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        return view("home.products.details")->with([
            "product" => $product,
            "similarProducts" => $similarProducts,
            "other_category" => $other_category,
            "other_products" => $other_products,
            "ratings" => $ratings,
            "rating_avg" => $ratings_avg
        ]);
    }
    public function addToCart(Request $request)
    {
        $the_user = auth()->user();
        $ProductId = request('productId');
        $product = \App\Models\Product::find($ProductId);
        $mode = $request->has('addToCart') ? 'cart' : 'donate';
        \Cart::add(
            $product->id,
            $product->name,
            $product->price,
            request('qnt'),
            ["product" => $product]
        );
        switch ($mode) {
            case 'cart':
                # code...
                return redirect(route('product-details', [$ProductId]));
                break;
            case 'donate':
                # code...
                return redirect(route('product-details', [$ProductId]));
                break;

            default:
                # code...
                break;
        }
    }

    public function search(Request $request){
        $search=$request->get('search');
        $products=Product::where('name->ar_SA','like','%'.$search.'%')->
        orwhere('name->en','like','%'.$search.'%')->
        orwhere('name->fr','like','%'.$search.'%')->paginate(12);

        $product_types = \App\Models\Product_type::all();
        $gift_type = \App\Models\GiftType::all();
        $shipping = \App\Models\ShippCom::all();
        $data = [
            "shipping" => $shipping,
            "gift_type" => $gift_type,
            "products" => $products,
            "product_types" => $product_types,
            "filters" => [
                "project_filters" => null,
                "price_filters" =>null,
                "price_range_start" => null,
                "price_range_end" => null,
                "product_type" =>
                explode(',', '1,2,3') ?? null,
            "product_evaluation" =>  null,
            "gift_type" => explode(',', '1,2' ?? ""),
            "shipping" => explode(',', '1,2' ?? "")
            ]
        ];
            return view("home.products.filters")->with($data);
    }
}
