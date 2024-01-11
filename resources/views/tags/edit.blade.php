@extends('main')

@section('content')

    <div class="col-md-6">

        {!! Form::model($Tag, ['route' => ['tags.update', $Tag->id], 'method' => 'PUT']) !!}

        {!! Form::label('name', 'Tag Nmae:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}

        {!! Form::submit('Save', ['class' => 'btn btn-success mt-2']) !!}
        {!! Form::close() !!}

    </div>

@endsection
