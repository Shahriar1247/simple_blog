@extends('main')

@section('content')

<div class="row">

    <div class="col-md-7">
        <h1>Categories</h1>
        <table class="table">

            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
            <tr>

            @foreach ($categories as $Category)

                <td>{{$Category->id}}</td>
                <td>{{$Category->name}}</td>


            </tr>
            @endforeach
        </table>
    </div>
    <div class="col-md-3">
        {!! Form::open(['route' => 'categories.store']) !!}
            <h2>New Category</h2>
            {{Form::label('name', 'Name:')}}
            {{Form::text('name', null, ['class' => 'form-control'])}}
            {!! Form::submit('Submit Category', ['class' => 'form-control btn btn-success mt-2']) !!}
        {!! Form::close() !!}
    </div>
</div>
<hr>

@endsection
