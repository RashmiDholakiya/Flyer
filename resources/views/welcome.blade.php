@extends('layout')
@section('nav')
    <li class="active"><a href="{!! url('/home') !!}">Home</a></li>
    <li ><a href="{!! url('show') !!}">Flyer</a></li>
    <li><a href="#">Page 2</a></li>
    <li><a href="#">Page 3</a></li>
@endsection
@section('contents')
    <div class="jumbotron col-md-8 col-md-offset-2">
        <h1>Hello</h1>

        <p>
<ul class="list-group">
    @foreach($data as $d)
        <li class="list-group-item"><a href="{!! url('rashmi/'.$d->id) !!}"> {!! $d->title   !!}</a></li>
    @endforeach
   </ul>
    </p>
    </div>
@endsection
