@extends('main')
@section('content')
    <div class="row">
    {!! Form::model($posts, [ 'route' => ['posts.update', $posts->id] ,'method' =>'PUT']) !!}
        <div class="col-md-8">

        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}

        {!! Form::label('slug', 'Slug:')!!}
        {!! Form::text('slug', null, ['class' => 'form-control'])!!}

        {!! Form::label('category_id', 'Category:', ['class' => 'form-spacing'])!!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

        {!! Form::label('body', 'Post Body:') !!}
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
                        <a href="{{route('posts.show', $posts->id)}}" class="btn btn-primary btn-block">Cancel</a>
                    </div>
                    <div class="col-sm-6 d-grid gap-2">
                        <a href="{{route('posts.update', $posts->id)}}" class="btn btn-danger btn-block">Update</a>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    </div>
    <a href="{{route('posts.index')}}">Index Page</a>
@endsection
