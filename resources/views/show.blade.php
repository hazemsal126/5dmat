@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h5>Created at:{{$order->created_at}}</h5>
        <h5>Order id:{{$order->id}}</h5>
        <h5>User name:{{$order->name}}</h5>
        <h5>Created at:{{$order->created_at}}</h5>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">الخدمة</th>
                <th scope="col">الوصف</th>
                <th scope="col">التصنيف</th>
                <th scope="col">الكمية</th>
                <th scope="col">السعر</th>
                <th scope="col"> المبلغ الإجمالي</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
            <tr>
                <th scope="row">{{$item->product_id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->type}}</td>
                <td>{{$item->count}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->total_price}}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
        <div style="text-align: right">
            <h5 >Total:{{$order->total}}</h5>
            </div>

    </section>
@endsection

