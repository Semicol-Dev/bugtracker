



@php
$loopCount = 0;
$loopCountProjects = 0;
@endphp
@extends('baseSideNav')
@section('core')

<br>
<nav class="navbar navbar-dark issue-list">
    <div>
        <h1 class="display-4">{{$team->name}}</h1>
   </div>
   @if (auth()->user()->isAdmin())
    <div style="width: 10%;" >
        <div class="row  d-flex justify-content-end">    
            <a class="btn btn-info btn-bug-template" style="color: #101010" href="/team/{{$team->id}}/edit">
                <i class="bi bi-pencil-fill"></i>Edit
            </a>            
        </div>
        <div class="row pt-2 d-flex justify-content-end">
            <form id="delete" method="post" action="/team/{{$team->id}}">
                @method('delete')
                @csrf
                <a class="btn btn-danger btn-bug-template" href="#" onclick="document.getElementById('delete').submit();">
                    <i class="bi bi-trash-fill"></i>Delete
                </a>
            </form>
        </div>
        </div>
    @endif
</nav>
<br>
<div class="issue-list-container issue-list"  style="height: calc(100vh - 220px)">
    
        <h2>Team Members</h2>
            <h5>
                <table class="table table-borderless issue-list">
                   <thead class="thead-fixed">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Privilege</th>
                        </tr>
                   </thead>
                   <tbody>
                        @foreach ($team->users as $user)
                            <tr>
                                <th>{{$loopCount += 1}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->name}}</td>
                            </tr>
                        @endforeach
                   </tbody>
                </table>
            </h5> 
    
    <hr>
        <h2>Team Projects</h2>
        <h5>
            <table class="table table-borderless issue-list">
                <thead class="thead-fixed">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Project Name</th>
                    </tr>
                </thead>
                    
               <tbody class="big-table">
                    @foreach ($team->projects as $project)
                        <tr>
                            <th>{{$loopCountProjects += 1}}</th>
                            <td>
                                <a  class="def-link" href="/project/{{$project->id}}" class="link-info">{{$project->name}}</a>
                            </td>
                        </tr>
                    @endforeach
               </tbody>
            </table>
        </h5>
    
</div>
@endsection