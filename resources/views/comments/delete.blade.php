@extends('main')

@section('content')

<div class="row">
    <div class="col-md-8">
        <p>Name: {{$comment->name}}</p>
        <p>Email: {{$comment->email}}</p>
        <strong>Comment:</strong><br>{{$comment->comment}}
        
        {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}
            {!! Form::submit('Delete Comment', ['class' => 'btn btn-lg btn-block btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection

