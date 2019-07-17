<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\ProductRating;

class RatingsController extends AccountBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = \App\ProductRating::where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->with('product')
            ->with('order')
            ->paginate(12);
        $data = [
            'ratings' => $ratings
        ];
        return view('account.ratings.ratings')->with($data);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$order_id)
    {
        $product = \App\Models\Product::withCount('order_items')
        ->withCount('ratings')
        ->with('ratings.user')
        ->where('id', $id)
        ->firstOrFail();
        return view('account.ratings.rating',compact('id','product','order_id'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id,$order_id)
    {
        $val = Validator::make($request->all(), [
            'rating' =>'required',
            'message' =>'required',
        ]);
        if ($val->passes()){
            $new=new ProductRating();
            $new->user_id=auth()->user()->id;
            $new->product_id=$id;
            $new->order_id=$order_id;
            $new->value=$request->get('rating');
            $new->message=$request->get('message');
            $new->save();
        }
        return redirect(route('Ratings.index'));
        //
    }
}
