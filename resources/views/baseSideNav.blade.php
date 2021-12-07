@extends('baseTopNav')
@section('contentUnder')

<div class="container"> 
    <div class="row " >
      <div class="col-2 side-menu">
        <div class="row">
          <div class="col-12">
            <br>
            <nav class="nav flex-column">
              <a class="nav-link " href="/issue"><i class="bi bi-stickies-fill"></i>Tickets</a>
              <a class="nav-link " href="/project"><i class="bi bi-file-bar-graph-fill"></i>Projects</a>
              <a class="nav-link" href="/team"><i class="bi bi-people-fill"></i>Teams</a>
            </nav>
           
          </div>
        </div>
        <div class="row justify-content-center" style=" height: calc(100vh - 350px)">
          <div class="col-10 align-self-end">
            <a class="btn btn-info btn-bug-template" style="color: #121212" type="submit" href="/issue/create" ><i class="bi bi-bug-fill"></i>Report Bug</a>
          </div>
        </div>
      </div> 
     
      <div class="col" style="background-color: #101010;
      ">
  
        @yield('core')

      </div>
    </div>
  </div>


@endsection