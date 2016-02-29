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
    <div class="col-md-6 col-md-offset-3">
        <div class="jumbotron ">
            <h1>Hello</h1>
            <p>
            <h2> {!! $data['fname'] !!},
                {!! $data['lname'] !!} </h2>
            </p>
        </div>
        <hr>
    </div>

    <div class="col-md-8 col-md-offset-3">
        <div class="col-md-9">
            @foreach($data['photo']->chunk(4) as $set)
                <div class="row">
                    @foreach($set as $photo)
                        <div class="col-md-3">
                            @if($data['user_id'] == \Illuminate\Support\Facades\Auth::id())
                            <form action="{{url('demo/'.$photo->id)}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                            @endif
                            <a href="{!! asset('flyers/photos/'.$photo->path) !!}" data-lity>
                                <img class=" img-thumbnail" src="{!! asset('flyers/photos/th'.$photo->path) !!}">
                            </a>
                        </div>
                    @endforeach
                </div>
                <hr>
            @endforeach
        </div>
    </div>
    @if($data['user_id'] == \Illuminate\Support\Facades\Auth::id())
    <div class="col-md-6 col-md-offset-3">
        <h2>Add new Photos</h2>
        <form  action="{!! url('/photo/'.$data['id']) !!}" class="dropzone">
            {!! csrf_field() !!}
        </form>
        <hr>
    </div>
    @endif
@endsection
{{--@for($i=0;$i<count($data['photo']);$i++)
                       <form action="{{url('demo/'.$data['photo'][$i]['id'])}}" method="POST">
                           {{ csrf_field() }}
                           <input type="hidden" name="_method" value="delete">
                           <input type="submit" value="delete" class="btn btn-danger">
                       </form>
              <a href="{!! asset('flyers/photos/'.$data['photo'][$i]['path']) !!}" data-lity>
                  <img class=" img-thumbnail" src="{!! asset('flyers/photos/th'.$data['photo'][$i]['path']) !!}" style="max-height: 20%;max-width: 20%">
              </a>
@endfor--}}