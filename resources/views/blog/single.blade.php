@extends('main')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <img src="{{asset($posts->image)}}" alt="">
            <h1>{{$posts->title}}</h1>
            <p>{{$posts->body}}</p>



        </div>

    </div><br>

    <div class="comment">
        <h3>Comments:</h3><br>
    </div>

    <div class="row">
        <div class="col-md-8">
            @foreach ($posts->comments as $comment)

                <h5>{{$comment->name}}</h5>
                        {{$comment->comment}} <br>

            @endforeach
        </div>
    </div>

    <h3 class="mt-5">Add your Comments: </h3>
    <div class="row">
        <div id="comment-form" class="col-md-8">
            {!! Form::open(['route' => ['comments.store', $posts->id], 'method' => 'POST']) !!}
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::label('name', "Name") !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="col-md-6" >
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="col-md-12">
                        {!! Form::label('comment', 'Comment') !!}
                        {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="col-md-12">
                        {!! Form::submit('Add Comment', ['class' =>'btn btn-primary mt-3']) !!}
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection

