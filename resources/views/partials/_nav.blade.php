<nav class="navbar navbar-expand-lg bg-body-primary">
    <div class="container-fluid">
      <a class="navbar-brand sha" href="/">Blog_24</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item fa1">
            <a class="nav-link" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item fa1">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item fa1">
            <a class="nav-link" style="color: black" href="/contact">Contact</a>
          </li>
        </ul>
      </div>
      <!-- Example single danger button -->
<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 20px ">
      Action
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item acive" href="{{route('register')}}">Sign Up</a>
      <a class="dropdown-item" href="{{route('login')}}">Log In</a>
      <a class="dropdown-item" href="{{route('posts.index')}}">Posts</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="{{route('tags.index')}}">Tags</a>
    </div>
  </div>
    </div>
</nav>
