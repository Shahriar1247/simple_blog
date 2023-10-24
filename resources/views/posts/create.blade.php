@extends('main')
@section('content')
    <div class="col-md-12">
        <h1 class="text-center">Create your post</h1>
        {!! Form::open(['url' =>route('posts.store')]) !!}
            {{ Form::label('title', 'Title:')}}
            {{ Form::text('title', null, array( 'class' => 'form-control')) }}
            {{ Form::label('slug', 'Slug:') }}
            {{ Form::text('slug', null, array( 'class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255'))}}
            {{ Form::label('body', 'Post Body:', ['class' => 'mt-2'])}}
            {{ Form::textarea('body', null, array( 'class' => 'form-control mt-2')) }}
            {{ Form::submit('Submit post', ['class' => 'form-control btn btn-success btn-block mt-2'])}}
        {!! Form::close() !!}
    </div>
@endsection
