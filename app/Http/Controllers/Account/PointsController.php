<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PointsController extends AccountBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pointsCount = \App\UserPoint::where('user_id', auth()->id())->sum(
            'amount'
        );
        $points = \App\UserPoint::where('user_id', auth()->id())
            ->where('user_point_type', 'IN')
            ->with('product')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $free_cards = \App\UserPointRedeem::whereHas('voucher', function ($q) {
            $q->where('voucher_type', '=', 'FREE CARD');
        })
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $coupons = \App\UserPointRedeem::whereHas('voucher', function ($q) {
            $q->where('voucher_type', '=', 'COUPON');
        })
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $data = [
            "free_cards" => $free_cards,
            "coupons" => $coupons,
            "pointCount" => $pointsCount,
            "points" => $points
        ];

        return view('account.points.points')->with($data);
        //
    }

    public function programs()
    {
        return view('account.points.program');
        //
    }
    public function redeem()
    {
        $pointsCount = \App\UserPoint::where('user_id', auth()->id())->sum(
            'amount'
        );
        $vouchers = \App\Models\Voucher::with('provider')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $data = [
            "amount" => $pointsCount,
            "vouchers" => $vouchers
        ];

        return view('account.points.redeem')->with($data);
        //
    }

    public function redeemVoucher($voucherId)
    {
        $user = auth()->user();
        $voucher = \App\Models\Voucher::find($voucherId);
        $pointsCount = (int) \App\UserPoint::where('user_id', $user->id)->sum(
            'amount'
        );
        if ($voucher->point_count <= $pointsCount) {
            $up = new \App\UserPoint();
            $up->amount = $voucher->point_count * -1;
            $up->user_id = $user->id;
            $up->user_point_type = 'OUT';
            $up->save();
            $upr = new \App\UserPointRedeem();
            $upr->user_id = $user->id;
            $upr->voucher_id = $voucherId;
            $upr->points_count = $voucher->point_count;
            $upr->status = true;
            $upr->save();
            $up->redeem_id = $upr->id;
            $up->save();
        }

        return redirect(route('Points.index'));
        //
    }
}
