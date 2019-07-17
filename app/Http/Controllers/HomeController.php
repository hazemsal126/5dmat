<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Order_Item;
use Carbon\Carbon;
use Behat\Mink\Mink;
use Behat\Mink\Session;
use DMore\ChromeDriver\ChromeDriver;
use App\ChatSession;
use App\Chat;

class HomeController extends PublicController
{
    //
    public function index(Request $request)
    {
        $TopDonatedProducts = Product::withCount('order_items')
            ->with('type')
            ->orderBy('order_items_count', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        $MostRecentProducts = Product::with('type')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        $FullFundedProducts = Product::whereColumn(
            'target_amount',
            '=',
            'acquired_amount'
        )
            ->with('type')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        $ZakatProducts = Product::where('product_type', '2')
            ->with('type')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        $FullFundedProductsCount = Product::whereColumn(
            'target_amount',
            '=',
            'acquired_amount'
        )->count();
        $TotalDonations = DB::table("order_items")
            ->select(\DB::raw('sum(price*count) as count'))
            ->first();
        $totalGifts = Order_item::with([
            'product' => function ($query) {
                $query->where('ContainsGift', '=', '1');
            }
        ])->count();
        $TopSlider = \App\Models\Slider::where('position', 'TOP')
            ->orderBy('id', 'desc')
            ->with('items')
            ->first();
        $BottomSlider = \App\Models\Slider::where('position', 'BOTTOM')
            ->orderBy('id', 'desc')
            ->with('items')
            ->first();
        return view("home.index")->with([
            "FullFundedProductsCount" => $FullFundedProductsCount,
            "TotalDonations" => $TotalDonations->count,
            "TotalGifts" => $totalGifts,
            "ZakatProducts" => $ZakatProducts,
            "FullFundedProducts" => $FullFundedProducts,
            "BottomSlider" => $BottomSlider,
            "TopSlider" => $TopSlider,
            "TopDonatedProducts" => $TopDonatedProducts,
            "MostRecentProducts" => $MostRecentProducts
        ]);
    }
    //
    public function login(Request $request)
    {
        return view("home.login");
    }
    //
    public function checkLogin(Request $request)
    {
        $result = Auth::attempt(
            [
                'email' => $request->login,
                'password' => $request->password
            ],
            true
        );
        return redirect(url('/'));
    }
    //
    public function register(Request $request)
    {
        return view("home.register");
    }
    //
    public function doRegister(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'mobileNumber' => 'required',
            'mobileCountry' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('register'))
                ->withErrors($validator->errors())
                ->withInput();
        } else {
            $data = $request->all();
            $data["password"] = Hash::make($data["password"]);
            $data["name"] = $request->firstName . ' ' . $request->lastName;
            $user = \App\User::create($data);
            $result = Auth::attempt(
                [
                    'email' => $request->email,
                    'password' => $request->password
                ],
                true
            );
            return redirect(url('/'));
        }
    }

    public function subscribeMailList(Request $request)
    {
        $mailList = new \App\MailingList();
        $mailList->email = $request->email;
        $mailList->save();
        return redirect()->back();
    }

    public function chatstore(Request $request,$type=null){
        $new= new Chat();
        $new->message=$request->get('message');
        $new->status=1;
        if ($type == 'admin'){
            $new->session_id=$request->get('session_id');
            $new->user_id=1;
            $user_id = 1;
        }else {
            $new->session_id = session('chat');
            $user_id = 0;
        }
        $new->save();
        $event = new \App\Events\SendChatEvent($new->message,$new->session_id,$new->created_at->format('H:i:s'),$new->status,$user_id);
        broadcast($event);
    }

    public function message(){
        $items=Chat::whereDate('created_at', Carbon::today())->orderby('created_at','desc')->pluck('session_id')->unique();
        return view('message',compact('items'));
    }

    public function msgid(Request $request,$session_id){
        $data=Chat::where('session_id',$session_id)->get();
        $view=view('msgid',compact('data'))->render();
        return response()->json(['status'=>true,'html'=>$view]);
    }

}
