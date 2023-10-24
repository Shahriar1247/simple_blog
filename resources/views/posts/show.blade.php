
@extends('main')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2 style="margin-top: 15px">{{$posts->title}}</h2>
            <p style="margin-top: 20px">{{$posts->body}}</p>
        </div>
        <div class="col-md-4">
            <div>
                <dl class="dl-horizontal">
                    <dt>URL:</dt>
                    <dd><a href="{{url($posts->slug)}}">{{$posts->slug}}</a></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{date('j F, Y ; G:i',strtotime($posts->created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Updated At:</dt>
                    <dd>{{date('j F, Y ; G:i',strtotime($posts->updated_at))}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6 d-grid gap-2">
                        <a href="{{route('posts.edit', $posts->id)}}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6 d-grid gap-2">
                        {!! Form::open(['route' => ['posts.destroy', $posts->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{route('posts.index')}}">Index Page</a>
@endsection
