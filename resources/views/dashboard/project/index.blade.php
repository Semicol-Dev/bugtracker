<!--<h1>Vsetky Projekt</h1>
@if (auth()->user()->isAdmin())
    <a href="/project/create">Vytvorit novy Projekt</a>
@endif

<table border=1>
    <tr>
        <td>Meno</td>
        <td>Team</td>
    </tr>
    @foreach ($projects as $project)
        <tr>
            <td>
                <a href="project/{{$project->id}}">{{$project->name}}</a>
            </td>
            <td>
                <a href="/team/{{$project->team->id}}">{{$project->team->name}}</a>
            </td>
        </tr>
    @endforeach
</table>-->
@php
$loopCount = 0
@endphp
@extends('baseSideNav')
@section('core')

<br>
<nav class="navbar navbar-dark issue-list">
    <h1 class="display-4">Projects</h1>
    @if (auth()->user()->isAdmin())
        <a class="btn btn-info btn-bug-template " style="color: #121212" type="submit" href="/project/create"><i class="bi bi-plus-circle-fill"></i>New Project</a>
    @endif
</nav>
<br>
<div class="issue-list-container issue-list"  style="height: calc(100vh - 215px)">
    
   <h3> 
       <table class="table table-borderless issue-list ">
            <thead class="thead-fixed">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Team</th>
                </tr>
            </thead>
            <tbody class="big-table">
                @foreach ($projects as $project)
                    <tr>
                        <th>{{$loopCount += 1}}</th>
                        <td>
                            <a  class="def-link" href="project/{{$project->id}}" class="link-info">{{$project->name}}</a>
                        </td>
                        <td>  
                            <a  class="def-link" href="/team/{{$project->team->id}}" class="link-info">{{$project->team->name}}</a>
                        </td>
                    </tr>
                @endforeach    
            </tbody>
      </table>
   </h3>
</div>
@endsection

