@extends('main')
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

<form action="{{url('contact')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label  for="exampleName" class="form-label">Name</label>
        <input name="name" type="text" class="form-control" id="exampleName" aria-describedby="nameHelp">
        <div id="nameHelp" class="form-text">Write your name with surname.</div>
      </div>
    <div class="mb-3">
      <label  for="exampleInputEmail1" class="form-label">Email address</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleadress1" class="form-label">Adress</label>
      <input name="adress" type="text" class="form-control" id="exampleadress1">
    </div>
    <div class = "form-group mb-3">
        <label  for = "name">Your askings</label>
        <textarea name="ask" class = "form-control" rows = "5" placeholder = "Please differenciate your interrogations!"></textarea>
     </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection


