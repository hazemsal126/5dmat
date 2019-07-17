<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use App\Models\Product_type;

class AppLayoutComposer
{
    public function compose(View $view)
    {
        $view->with('productCategory', Product_type::all());
        $cartCollection = \Cart::getContent();
        $view->with('cartItems', $cartCollection->toArray());
    }
}
