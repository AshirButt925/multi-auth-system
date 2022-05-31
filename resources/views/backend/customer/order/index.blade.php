@extends('layouts.backend.main')
@section('content')
    <form action="{{route('customer.place.order.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="no_of_widgets">Enter Number Of Widgets</label>
                    <input type="number" name="no_of_widgets" class="form-control" id="no_of_widgets">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mt-2 pt-4">
                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
