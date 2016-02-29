@extends('layout')
@section('nav')
    <li class="active"><a href="{!! url('/home') !!}">Home</a></li>
    <li><a href="{!! url('show') !!}">Flyer</a></li>
    <li><a href="#">Page 2</a></li>
    <li><a href="#">Page 3</a></li>
@endsection
@section('contents')
    <div class="jumbotron col-md-8 col-md-offset-2">
        <h2>All Cards</h2>

        <p>
        <ul class="list-group">
            @foreach($data as $d)
                <li class="list-group-item"><a href="{!! url('rashmi/'.$d->id) !!}"> {!! $d->title   !!}</a></li>
            @endforeach
        </ul>
        </p>
    </div>

    <div class="col-md-8 col-md-offset-2">
        <h2> Create Card </h2>
        <hr>
        <form action="{!! url('card') !!}" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="First Name">
                <input type="hidden" name="user_id" value="{!! \Illuminate\Support\Facades\Auth::id() !!}">
            </div>
            <div class="form-group">

                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            </div>
            </form>
    </div>
@endsection
