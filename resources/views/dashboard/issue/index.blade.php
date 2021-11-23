@extends('baseSideNav')
@section('title')
    index
@endsection
@section('core')
<br>
<nav class="navbar navbar-dark issue-list">
    <h1 class="display-4">All Tickets</h1>
</nav>
<br>
<div class="issue-list-container">
    <div>
        @foreach ($issues as $issue)
        <div class="issue-list">
            <h1><a class="def-link link-info" href="/issue/{{$issue->id}}">{{$issue->title}}</a> 
            @switch($issue->type)
                @case(1)
                <span class="badge  badge-pill badge-danger">{{$issue->project->name}}</span>
                    @break
                @case(2)
                <span class="badge  badge-pill badge-warning">{{$issue->project->name}}</span>
                    @break
                @case(3)
                <span class="badge  badge-pill badge-secondary">{{$issue->project->name}}</span>
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