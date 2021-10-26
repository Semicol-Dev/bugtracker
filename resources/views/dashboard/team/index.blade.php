@php
$loopCount = 0
@endphp
@extends('baseSideNav')
@section('core')

<br>
<nav class="navbar navbar-dark issue-list">
    <h1 class="display-4">Teams</h1>
    <a class="btn btn-info btn-bug-template " style="color: #121212" type="submit" href="/team/create" ><i class="bi bi-plus-circle-fill"></i>New Team</a>
</nav>
<br>
<div class="issue-list-container issue-list"  style="height: calc(100vh - 215px)">
    
   <h3> 
       <table class="table table-borderless issue-list">
            <thead class="thead-fixed">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Memembers</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <th>{{$loopCount += 1}}</th>
                        <td>
                            <a  class="def-link" href="team/{{$team->id}}" class="link-info">{{$team->name}}</a>
                        </td>
                        <td>{{$team->users->count()}}</td>
                    </tr>
                @endforeach
                @foreach ($teams as $team)
                <tr>
                    <th>{{$loopCount += 1}}</th>
                    <td>
                        <a  class="def-link" href="team/{{$team->id}}" class="link-info">{{$team->name}}</a>
                    </td>
                    <td>{{$team->users->count()}}</td>
                </tr>
            @endforeach
            @foreach ($teams as $team)
            <tr>
                <th>{{$loopCount += 1}}</th>
                <td>
                    <a  class="def-link" href="team/{{$team->id}}" class="link-info">{{$team->name}}</a>
                </td>
                <td>{{$team->users->count()}}</td>
            </tr>
        @endforeach
        @foreach ($teams as $team)
        <tr>
            <th>{{$loopCount += 1}}</th>
            <td>
                <a  class="def-link" href="team/{{$team->id}}" class="link-info">{{$team->name}}</a>
            </td>
            <td>{{$team->users->count()}}</td>
        </tr>
    @endforeach
    @foreach ($teams as $team)
    <tr>
        <th>{{$loopCount += 1}}</th>
        <td>
            <a  class="def-link" href="team/{{$team->id}}" class="link-info">{{$team->name}}</a>
        </td>
        <td>{{$team->users->count()}}</td>
    </tr>
@endforeach
@foreach ($teams as $team)
<tr>
    <th>{{$loopCount += 1}}</th>
    <td>
        <a  class="def-link" href="team/{{$team->id}}" class="link-info">{{$team->name}}</a>
    </td>
    <td>{{$team->users->count()}}</td>
</tr>
@endforeach
            </tbody>
      </table>
   </h3>
@endsection