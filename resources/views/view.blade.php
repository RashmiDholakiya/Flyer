@extends('layout')
@section('nav')
    <li class="active"><a href="{!! url('/home') !!}">Home</a></li>
    <li><a href="{!! url('show') !!}">Flyer</a></li>
    <li><a href="#">Page 2</a></li>
    <li><a href="#">Page 3</a></li>
@endsection
@section('contents')
    @if(Session::has('message'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert {{ Session::get('alert-class', 'alert-info') }} msg">
                    {{ Session::get('message') }}
                </div>
            </div>
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-md-8 col-md-offset-2">
        <h1 class="list-group-item"> {!! $id->title !!} </h1>

        <h4 class="list-group-item">Created By:: {!! $data->name !!}</h4>

   <br>
        <h2>Create Flyer</h2>
        <hr>


        <form action="{!! url('/save') !!}" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="hidden" name="user_id" value="{!! \Illuminate\Support\Facades\Auth::id() !!}">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" name="fname" placeholder="First Name">
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" name="lname" placeholder="Last Name">
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select class="form-control" name="country">

                    @foreach(App\Http\Utilities\country::all() as $name=>$code)
                        <option value="{!! $code !!}">{!! $name !!}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection