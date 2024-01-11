@extends('main')

@section('content')

<div class="row mt-3">
    <div class="col-md-6">
        <h1 class="ami">All Posts</h1>
    </div>
    <div class="col-md-6 d-grid gap-2">
        <a href="{{route('posts.create')}}" class="btn btn-lg btn-outline-dark">Create post</a>
        <a class="btn btn-lg btn-outline-dark" style="" href="{{route('login')}}">Log in</a>
        <a class="btn btn-lg btn-outline-dark" style="" href="{{route('register')}}">Register</a>
    </div>
</div>
<div class="col-md-12">
    <table class="table table-dark table-hover mt-5 mb-5">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Post</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>

        @foreach ( $allPost as $posts )

        <tr>
            <td>{{ $posts->id }}</td>
            <td>{{ $posts->title }}</td>
            <td>{{ substr(strip_tags($posts->body), 0, 45) }} {{ strlen(strip_tags($posts->body)) > 50 ? "..." : ""}}</td>
            <td>{{ date('j F, Y ; G:i',strtotime($posts->created_at)) }}</td>
            <td>
                <a href="{{route('posts.edit', $posts->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('posts.show', $posts->id)}}" class="btn btn-primary">View</a>
            </td>
        </tr>
        @endforeach

    </table>

    <div class="text-center">
        {!! $allPost-> links(); !!}
    </div>
</div>

@endsection
