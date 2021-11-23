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
        @foreach (auth()->user()->my_issues() as $issue)
            @if ($issue->type == 1)
                <div class="issue-list">
                    <h1><a class="def-link link-info" href="/issue/{{$issue->id}}">{{$issue->title}}</a> <span class="badge  badge-pill badge-danger">{{$issue->project->name}}</span></h1>
                    <h4>{{$issue->description}}</h4>
                    <h6>Created: {{$issue->created_at}}</h6>
                    <hr>
                </div>
            @endif
            @if ($issue->type == 2)
                <div class="issue-list">
                    <h1><a class="def-link link-info" href="/issue/{{$issue->id}}">{{$issue->title}}</a> <span class="badge  badge-pill badge-warning">{{$issue->project->name}}</span></h1>
                    <h4>{{$issue->description}}</h4>
                    <h6>Created: {{$issue->created_at}}</h6>
                    <hr>
                </div>
            @endif
            @if ($issue->type == 3)
                <div class="issue-list">
                    <h1><a class="def-link link-info" href="/issue/{{$issue->id}}">{{$issue->title}}</a> <span class="badge  badge-pill badge-secondary">{{$issue->project->name}}</span></h1>
                    <h4>{{$issue->description}}</h4>
                    <h6>Created: {{$issue->created_at}}</h6>
                    <hr>
                </div>
            @endif
        @endforeach
    </div>
    <div>
        @foreach (auth()->user()->solved_issues(false) as $issue)
            @if ($issue->type == 1)
                <div class="issue-list">
                    <h1><a class="def-link link-info" href="/issue/{{$issue->id}}">{{$issue->title}}</a> <span class="badge  badge-pill badge-danger">{{$issue->project->name}}</span><span class="badge  badge-pill badge-success">Solved</span></h1>
                    <h4>{{$issue->description}}</h4>
                    <h6>Created: {{$issue->created_at}}</h6>
                    <hr>
                </div>
            @endif
            @if ($issue->type == 2)
                <div class="issue-list">
                    <h1><a class="def-link link-info" href="/issue/{{$issue->id}}">{{$issue->title}}</a> <span class="badge  badge-pill badge-warning">{{$issue->project->name}}</span><span class="badge  badge-pill badge-success">Solved</span></h1>
                    <h4>{{$issue->description}}</h4>
                    <h6>Created: {{$issue->created_at}}</h6>
                    <hr>
                </div>
            @endif
            @if ($issue->type == 3)
                <div class="issue-list">
                    <h1><a class="def-link link-info" href="/issue/{{$issue->id}}">{{$issue->title}}</a> <span class="badge  badge-pill badge-secondary">{{$issue->project->name}}</span><span class="badge  badge-pill badge-success">Solved</span></h1>
                    <h4>{{$issue->description}}</h4>
                    <h6>Created: {{$issue->created_at}}</h6>
                    <hr>
                </div>
            @endif
        @endforeach
    </div>
</div>

@endsection