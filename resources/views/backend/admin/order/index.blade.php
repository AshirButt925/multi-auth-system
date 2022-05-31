@extends('layouts.backend.main')
@section('content')
    <form action="{{route('admin.orders')}}" method="POST">
        @csrf
        @if(isset($orders) && count($orders) > 0)
            @foreach($orders as $order)
                <div class="card">
                    <div class="card-header">
                        <h3>{{$order->customer->name}} | Date/time: {{\Carbon\Carbon::parse($order->created_at)->format('d M, Y: h:i:s a')}}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Widget</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->widgets as $key => $widget)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$widget->widget->value}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        @endif
    </form>
@endsection
