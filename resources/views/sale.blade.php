@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">المبيعات</th>
                <th scope="col">الزبون</th>
                <th scope="col">السعر</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <th scope="row"><img style="width: 50px" src="{{asset('storage/'.$order->image)}}"> - {{$order->pname}}</th>
                <td>{{$order->uname}}</td>
                <td>{{$order->pprice}}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
        <div style="text-align: right">
            {{$orders->links()}}
            </div>

    </section>
@endsection

