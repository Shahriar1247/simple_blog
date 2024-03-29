@extends('main')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="mt-4 p-5 bg-primary text-white rounded">
                    <h1>Welcome to my blog</h1>
                    <p>Thanks for visiting my blogsite</p>
                    <p><a href="#" class="btn btn-outline-secondary mt-3" role="button">Popular post</a></p>
                  </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-8">


        @foreach ($postss as $posts)



            <div class="post">
                <h1>{{$posts->title}}</h1>
                <p>{{substr(strip_tags($posts->body),0,300)}} {{strlen(strip_tags($posts->body))> 300 ? "...":""}}</p>
                <a href="{{ url('blog/'.$posts->slug) }}" class="btn btn-primary">Read more</a>

            </div>

            <hr>

        @endforeach



        </div>
            <div class="col-md-3 col-md-offset-1">
                <h2>Sidebar</h2>
            </div>

@endsection
