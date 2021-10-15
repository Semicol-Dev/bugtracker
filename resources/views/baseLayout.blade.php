@extends('baseFramework')
@section('content')
<nav class="navbar navbar-dark " style="background-color: #0D7377" >
    <div class="navbar-brand logo" href="#">BUGTRAC.IO</div>
     <div class="my-search">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
              </svg>
        </span>
        <form>
            <input type="text" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
        </form>
    </div>
    <div class="btn-group dropleft">
        <button class=" my-profile mbtn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another </a>
          <a class="dropdown-item" href="#">Something </a>
        </div>
      </div>
</nav>

<!--
<div class="container-fluid padding">
  <div class="row padding">
    <div class="col-3 side-menu" >
      <div class="row">
        <div class="col-1">
        </div>
        <div class="col-2">
          <h3><i class="bi bi-clipboard-data" style="color: white"></i> </h3>
        </div>
        <div class="col-4" style="background-color: rgb(185, 49, 49)">
          <h3  class="display-5" style="color: white">REEEE</h3>
        </div>
      </div>
    </div>
    <div class="col-9">
      
    </div>
  </div>
</div>
-->
<div class="container-fluid"> 
  <div class="row " >
    <div class="col-2 side-menu">
      <div class="row">
        <div class="col-12">
          <br>
          <nav class="nav flex-column">
            <a class="nav-link active" href="#"><i class="bi bi-stickies-fill"></i>Tickets</a>
            <a class="nav-link" href="#"><i class="bi bi-file-bar-graph-fill"></i>Projects</a>
            <a class="nav-link" href="#"><i class="bi bi-people-fill"></i>Teams</a>
          </nav>
         
        </div>
      </div>
      <button class="btn btn-template btndisclaimer" type="submit"><i class="bi bi-bug-fill"></i>Report Bug</button>
    </div> 
    <div class="col" style="background-color: #101010">

      
    </div>
  </div>
</div>


 

@yield('core')
@endsection
