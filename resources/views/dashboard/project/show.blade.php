@extends('baseSideNav')
@section('title')
    index
@endsection
@section('core')
<br>
<nav class="navbar navbar-dark issue-list">
   <div>
        <h1 class="display-4">{{$project->name}}</h1>
        <h2>Team: {{$project->team->name}}</h2>
   </div>
   @if (auth()->user()->isAdmin())
    <div style="width: 10%; ">
        <div class="row  d-flex justify-content-end">
                    <a class="btn btn-info btn-bug-template" style="color: #101010" href="/project/{{$project->id}}/edit">
                        <i class="bi bi-pencil-fill"></i>Edit
                    </a>
        </div>
        <div class="row pt-2 d-flex justify-content-end">

            <form id="delete" method="post" action="/project/{{$project->id}}">
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
<div class="issue-list-container issue-list"  style="height: calc(100vh - 265px)">
    <div>
        @foreach ($project->issues as $issue)
        <div class="issue-list">
            <h1><a class="def-link link-info" href="/issue/{{$issue->id}}">{{$issue->title}}</a> 
            @switch($issue->type)
                @case(1)
                <span class="badge  badge-pill badge-danger">Critical</span>
                    @break
                @case(2)
                <span class="badge  badge-pill badge-warning">Casual</span>
                    @break
                @case(3)
                <span class="badge  badge-pill badge-secondary">Feature</span>
                    @break
            @endswitch
            @if ($issue->status == 1)
                <span class="badge  badge-pill badge-success">Solved</span>
            @endif
        </h1>
        <h4>{{$issue->description}}</h4>
        <h6>Created: {{$issue->created_at}}</h6>
        <hr>
        </div>
        @endforeach
    </div>
</div>

@endsection
