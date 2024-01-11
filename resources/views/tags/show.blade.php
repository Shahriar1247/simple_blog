@extends('main')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h3>{{$Tag->name}}</h3> <p>{{$Tag->posts()->count()}} posts</p>
    </div>
    <div class="col-md-2">
        <a href="{{route('tags.edit', $Tag->id)}}" class="btn btn-primary">Edit</a>
    </div>
    <div class="col-md-2">
        {!! Form::open(['route' => ['tags.destroy', $Tag->id], 'method' => 'DELETE']) !!}

        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Tags</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $Tag->posts as $posts )

                <tr>
                    <td>{{$posts->id}}</td>
                    <td>{{$posts->title}}</td>
                    <td>
                        @foreach ($posts->tags as $Tag  )
                            <span>{{$Tag->name}}</span>
                        @endforeach
                    </td>
                    <td><a href="{{route('posts.show', $posts->id)}}" class="btn btn-primary">View</a></td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
