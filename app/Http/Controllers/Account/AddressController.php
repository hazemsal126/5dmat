<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AddressController extends AccountBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MainAddress = \App\Address::where('user_id', auth()->id())
            ->where('is_primary', true)
            ->get();

        $Addresses = \App\Address::where('user_id', auth()->id())
            ->where('is_primary', false)
            ->paginate(10);
        //
        return view('account.addresses.addresses')->with([
            "MainAddress" => $MainAddress,
            "Addresses" => $Addresses
        ]);
    }
    public function markAsDefault($addressId)
    {
        \App\Address::where('user_id', auth()->id())->update([
            "is_primary" => false
        ]);
        $address = \App\Address::where("id", $addressId)
            ->where('user_id', auth()->id())
            ->firstOrFail();
        $address->is_primary = true;
        $address->save();
        return redirect(route('Addresses.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $countries = \App\Country::pluck('name', 'id');

        return view('account.addresses.create')->with([
            'countries' => $countries
        ]);
    }

    public function getStates($CountryId)
    {
        //
        $states = \App\State::where('country_id', $CountryId)->pluck(
            'name',
            'id'
        );
        return $states;
    }
    public function getCities($StateId)
    {
        //
        $cities = \App\City::where('state_id', $StateId)->pluck('name', 'id');
        return $cities;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'country' => 'required',
            'geolocation' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'mobile' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('Addresses.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $address = new \App\Address();
        $address->firstName = $request->firstName;
        $address->lastName = $request->lastName;
        $address->address = $request->address;
        $address->geolocation = $request->geolocation;

        $address->country_id = $request->country;
        $address->state_id = $request->state;
        $address->city_id = $request->city;
        $address->is_primary = false;

        $address->mobileNumber = $request->mobile;
        $address->user_id = auth()->id();
        $address->save();
        return redirect(route('Addresses.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('account.addresses.edit');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $address = \App\Address::where("id", $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $countries = \App\Country::pluck('name', 'id');
        $states = \App\State::where('country_id', $address->country_id)->pluck(
            'name',
            'id'
        );
        $cities = \App\City::where('state_id', $address->state_id)->pluck(
            'name',
            'id'
        );

        return view('account.addresses.edit')->with([
            "address" => $address,
            "states" => $states,
            "cities" => $cities,
            "countries" => $countries
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'geolocation' => 'required',
            'address' => 'required',
            'mobile' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('Addresses.edit', $id))
                ->withErrors($validator)
                ->withInput();
        }
        $address = \App\Address::where("id", $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();
        $address->firstName = $request->firstName;
        $address->lastName = $request->lastName;
        $address->address = $request->address;
        $address->country_id = $request->country;
        $address->state_id = $request->state;
        $address->city_id = $request->city;
        $address->geolocation = $request->geolocation;
        $address->mobileNumber = $request->mobile;
        $address->user_id = auth()->id();
        $address->save();
        return redirect(route('Addresses.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $address = \App\Address::where("id", $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();
        $address->delete();

        return redirect(route('Addresses.index'));
    }
}
