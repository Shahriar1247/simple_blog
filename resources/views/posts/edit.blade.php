@extends('main')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    {!! Form::model($posts, [ 'route' => ['posts.update', $posts->id] ,'method' =>'PUT', 'files' => true]) !!}
        <div class="col-md-8">

        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}

        {!! Form::label('slug', 'Slug:')!!}
        {!! Form::text('slug', null, ['class' => 'form-control'])!!}

        {!! Form::label('category_id', 'Category:', ['class' => 'form-spacing'])!!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

        {!! Form::label('featured_image', 'Update photo:', ['class' => 'mt-3'] ) !!} <br>
        {!! Form::file('featured_image') !!} <br>

        {!! Form::label('body', 'Post Body:', ['class' => 'mt-3']) !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

        </div>
        <div class="col-md-4">
            <div>
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
                        <a href="{{route('posts.show', $posts->id)}}" class="btn btn-primary btn-block mt-2">Cancel</a>
                    </div>
                    <div class="col-sm-6 d-grid gap-2">
                        {!! Form::submit('Update', ['class' => 'btn btn-success btn-block mt-2']) !!}
                    </div>
                </div>
                <div class="row">


                </div>

            </div>
        </div>
    {!! Form::close() !!}
    </div>
    <a href="{{route('posts.index')}}">Index Page</a>
@endsection
