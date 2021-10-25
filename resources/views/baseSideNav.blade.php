@extends('baseTopNav')
@section('contentUnder')

<div class="container-fluid"> 
    <div class="row " >
      <div class="col-2 side-menu">
        <div class="row">
          <div class="col-12">
            <br>
            <nav class="nav flex-column">
              <a class="nav-link active" href="#"><i class="bi bi-stickies-fill"></i>Tickets</a>
              <a class="nav-link" href="#"><i class="bi bi-file-bar-graph-fill"></i>Projects</a>
              <a class="nav-link" href="/team"><i class="bi bi-people-fill"></i>Teams</a>
            </nav>
           
          </div>
        </div>
        <button class="btn btn-info btn-bug-template btn-disclaimer" style="color: #121212" type="submit"><i class="bi bi-bug-fill"></i>Report Bug</button>
      </div> 
      <div class="col" style="background-color: #101010;
      ">
  
        @yield('core')

      </div>
    </div>
  </div>


@endsection