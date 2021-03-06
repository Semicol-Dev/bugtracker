@extends('baseFramework')
@section('content')
<div class="container">
  <nav class="navbar navbar-dark " style="background-color: #0D7377" >
      <a class="navbar-brand logo" href="/home">BUGTRAC.IO</a>
       <div class="my-search">
          <span>
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
          </span>
          <form action="issue">
              <input type="text" name="search" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1" autocomplete="off">
          </form>
      </div>
      <div class="btn-group dropleft">
          <button 
          style="background-image: url({{auth()->user()->picture}});"
          class=" my-profile mbtn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @if (auth()->user()->isAdmin())
              <a class="dropdown-item" href="/user/admin">Administration</a>
            @endif
            <a class="dropdown-item" href="/user">Settings</a>
            <a class="dropdown-item" onclick='$("#logout_form").submit();' href="#">Logout</a>
          </div>
        </div>
  </nav>
  <form id="logout_form" action="../../logout" method="post">
    @csrf
  </form>
  @yield('contentUnder')
</div>
@endsection
