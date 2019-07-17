<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentsController extends AccountBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        // $Studets = \App\Models\Student::whereRaw(
        //     \DB::raw("id in (select student_id from students_products where product_id in (select distinct `product_id` from order_items where order_id in (select id from `order` where user_id = {$user->id})))")
        // );
        $Products = \App\Models\Product::whereRaw(
            \DB::raw(
                "id in (select distinct `product_id` from order_items where order_id in (select id from `order` where user_id = {$user->id}))"
            )
        )->paginate(9);
        // dd($Products);
        $data = [
            // "students" => $Studets,
            "Products" => $Products
        ];
        return view('account.students.students')->with($data);
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Product = \App\Models\Product::with('articles')->find($id);
        // dd($Product);
        $data = [
            "Product" => $Product,
            "Articles" => $Product->articles
        ];
        return view('account.students.student')->with($data);
        //
    }
}
