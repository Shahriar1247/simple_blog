
@extends('main')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2 style="margin-top: 15px">{{$posts->title}}</h2>
            <p style="margin-top: 20px">{!! $posts->body !!}</p>

            <hr>

            <div class="tags">
                @foreach ($posts->tags as $tag)
                    <span class="badge bg-primary text-wrap">{{$tag->name}}</span>
                @endforeach
            </div>


            <div class="backend_comments" style="margin-top:30px">
                <h3>Comments: <small>{{$posts->comments()->count()}}</small></h3>

                <table class="table" style="width: 650px">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($posts->comments as $comment)
                    <tr>

                        <td>{{$comment->name}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->comment}}</td>
                        <td> <a href="{{route('comments.edit', $comment->id)}}"><i class="bi bi-pencil-fill"></i></a>
                            <a href="{{route('comments.delete', $comment->id)}}"><i class="bi bi-trash3-fill" style="margin-left: 5px"></i></a>
                        </td>

                    </tr>
                    @endforeach
                </table>
            </div>

        </div>


        <div class="col-md-4">
            <div>
                <dl class="dl-horizontal">
                    <dt>URL:</dt>
                    <dd><a href="{{ url('blog/'.$posts->slug) }}">{{ url($posts->slug) }}</a></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Category:</dt>
                    <p>{{$posts->Category->name}}</p>
                </dl>
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
                        <a href="{{route('posts.edit', $posts->id)}}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6 d-grid gap-2">
                        {!! Form::open(['route' => ['posts.destroy', $posts->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{route('posts.index')}}">Index Page</a>
@endsection
