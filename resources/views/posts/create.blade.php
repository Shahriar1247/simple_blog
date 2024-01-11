@extends('main')
@section('stylesheets')

{!! Html::style('asset/select2/select2.min.css') !!}
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea',
        plugins: 'link code',
        //toolbar: 'link',

      });
    </script>

@endsection

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
            <select name="tags[]"  data-placeholder="Choose tags ..." class="tags-select2 form-control" multiple="true">
                @foreach ($tags as $Tag)

                <option value="{{$Tag->id}}">{{$Tag->name}}</option>

                @endforeach
            </select>
            {!! Form::label('featured_image', 'Upload photo:', ['class' => 'mt-3'] ) !!}
            {!! Form::file('featured_image') !!} <br>

            {{ Form::label('body', 'Post Body:', ['class' => 'mt-2'])}}
            {{ Form::textarea('body', null, array( 'class' => 'form-control mt-4', 'id' => 'mytextarea')) }}

            {{ Form::submit('Submit post', ['class' => 'form-control btn btn-success btn-block mt-2'])}}
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
{!!Html::script('asset/select2/select2.min.js')!!}

<script type="text/javascript">
$(".tags-select2").select2();
</script>
@endsection
