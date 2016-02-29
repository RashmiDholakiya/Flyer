@extends('layout')
@section('nav')
    <li><a href="{!! url('/home') !!}">Home</a></li>
    <li class="active"><a href="{!! url('show') !!}">Flyer</a></li>
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
    <div>
        <div class="jumbotron col-md-8 col-md-offset-2">
            <h3>Hello,</h3>
            <p>
            <ul class="list-group-item">
                @foreach($data as $row)
                    <h5><a href='{!! url('show/'.$row->id) !!}'> {!! $row->fname !!},
                            {!! $row->lname !!} </a></h5>
                    <hr>
                @endforeach
            </ul>
            </p>
        </div>
@endsection