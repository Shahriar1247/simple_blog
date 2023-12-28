@extends('main')

@section('content')

<h1>Edit Comments</h1>

    {!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) !!}

        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}

        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}

        {!! Form::label('comment', 'Comment') !!}
        {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}

        {!! Form::submit('Update Comment', ['class' => 'btn btn-success btn-block mt-2']) !!}

    {!! Form::close() !!}
    
@endsection




