@extends('main')

@section('content')

<div class="row">

    <div class="col-md-7">
        <h1>Tags</h1>
        <table class="table">

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <tr>

            @foreach ($tags as $Tag)

                <td>{{$Tag->id}}</td>
                <td>{{$Tag->name}}</td>
                <td><a href="{{route('tags.show', $Tag->id)}}" class="btn btn-sml">View</a></td>


            </tr>
            @endforeach
        </table>
    </div>
    <div class="col-md-3">
        {!! Form::open(['route' => 'tags.store']) !!}
            <h2>New Tag</h2>
            {{Form::label('name', 'Name:')}}
            {{Form::text('name', null, ['class' => 'form-control'])}}
            {!! Form::submit('Submit Category', ['class' => 'form-control btn btn-success mt-2']) !!}
        {!! Form::close() !!}
    </div>
</div>
<hr>

@endsection
