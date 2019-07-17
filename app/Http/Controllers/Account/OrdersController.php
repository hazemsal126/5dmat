<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_item;

class OrdersController extends AccountBaseController
{
    //
    public function index(Request $request)
    {
        // dd(auth()->user());
        $orders = \App\Models\Order::where('user_id', auth()->id())
            ->with('order_items.product')
            ->orderby('id','desc')
            ->paginate(8);
        // dd();
        # code...
        return view('account.orders.orders')->with(["orders" => $orders]);
    }
    public function cart(Request $request)
    {
        $cartCollection = \Cart::getContent();
        # code...
        $x = $cartCollection->toArray();
        // dd(
        //     $x[9949]["attributes"]["product"]["description"][
        //         \Config::get('app.locale_prefix')
        //     ]
        // );
        $data = [
            "items" => $cartCollection->toArray(),
            'total' => \Cart::getTotal(),
            'subTotal' => \Cart::getSubTotal()
        ];
        return view("account.orders.cart", $data);
    }
    public function removeCartItem(Request $request, $itemId)
    {
        \Cart::remove($itemId);
        return redirect()->route('cart');
    }
    public function shipping(Request $request)
    {
        # code...
        $user = auth()->user();
        $addresses = $user
            ->addresses()
            ->orderByDesc('is_primary')
            ->paginate(15);
        return view("account.orders.shipping")->with([
            'addresses' => $addresses
        ]);
    }
    public function setAddress(Request $request)
    {
        $user = auth()->user();
        $isValidAddress = $user
            ->addresses()
            ->where('id', $request->address)
            ->exists();
        if ($isValidAddress) {
            $request->session()->put('order-address', $request->address);
            return ["status" => true];
        } else {
            return ["status" => false];
        }

        # code...
    }
    public function paymentInformation(Request $request)
    {
        # code...
        $address=$request->get('address_id');
        return view("account.orders.paymentinformation",compact('address'));
    }

    public function dopayment(Request $request){
        $cartCollection = \Cart::getContent();
        # code...
        $items = $cartCollection->toArray();
        $new= new Order();
        $new->total=\Cart::getTotal();
        $new->user_id=auth()->user()->id;
        $new->item_count=$cartCollection->count();
        $new->address_id=$request->get('address');
        if($new->save())
        foreach($items as $item){
            $i_order=new Order_item();
            $i_order->order_id=$new->id;
            $i_order->product_id=$item['id'];
            $i_order->count=$item['quantity'];
            $i_order->price=$item['price'];
            $i_order->total_price=$item['price'] * $item['quantity'];
            $i_order->save();
            \Cart::remove($item['id']);
        }

        return redirect()->route('cart');
    }

    public function received($id){
        $item=Order::where([['id',$id],['user_id',auth()->user()->id]])->first();
        if(isset($item)){
            $item->received=1;
            $item->save();
        }
        return redirect()->back();
    }

    public function delete($id){
        $item=Order::where([['id',$id],['user_id',auth()->user()->id],['received',1]])->first();
        if(isset($item)){
            foreach($item->order_items as $order){
                Order_item::destroy($order->id);
            }
            Order::destroy($id);
        }
        return redirect()->back();
    }
}
