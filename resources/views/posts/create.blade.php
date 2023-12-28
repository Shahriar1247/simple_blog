@extends('main')
@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')
    <div class="col-md-12">
        <h1 class="text-center">Create your post</h1>
        {!! Form::open(['url' =>route('posts.store'), 'files' => 'true']) !!}
            {{ Form::label('title', 'Title:')}}
            {{ Form::text('title', null, array( 'class' => 'form-control')) }}

            {{ Form::label('slug', 'Slug:') }}
            {{ Form::text('slug', null, array( 'class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255'))}}

            {!! Form::label('category_id', 'Category:') !!}
            <select name="category_id" class="form-control mt-2">
                @foreach ($categories as $Category)

                <option value="{{$Category->id}}">{{$Category->name}}</option>

                @endforeach
            </select>

            {!! Form::label('tags', 'Tags:') !!}
            <select name="tags" class="form-control mt-2" multiple="multiple">
                @foreach ($tags as $Tag)

                <option value="{{$Tag->id}}" selected="selected">{{$Tag->name}}</option>

                @endforeach
            </select>
            {!! Form::label('featured_image', 'Upload photo:', ['class' => 'mt-3'] ) !!}
            {!! Form::file('featured_image') !!} <br>

            {{ Form::label('body', 'Post Body:', ['class' => 'mt-2'])}}
            {{ Form::textarea('body', null, array( 'class' => 'form-control mt-2')) }}

            {{ Form::submit('Submit post', ['class' => 'form-control btn btn-success btn-block mt-2'])}}
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')

{!!Html::script('js/select2.min.js')!!}

<script>
    $(".js-example-tokenizer").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })
    </script>
@endsection
