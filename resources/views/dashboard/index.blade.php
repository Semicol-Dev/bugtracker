@extends('baseSideNav')
@section('title')
    index
@endsection
@section('core')
<br>
<nav class="navbar navbar-dark">
    <button type="button" class=" btn btn-info btn-square-template" style="background-color: #101010" onclick="listFilter(0)"><h2>{{auth()->user()->my_issues()->count()}}</h2><h5>Active</h5></button>
    <button type="button" class="btn btn-danger btn-square-template" onclick="listFilter(1)"><h2>{{auth()->user()->type_issue(1)->count()}}</h2><h5>Critical</h5></button>
    <button type="button" class="btn btn-warning btn-square-template"onclick="listFilter(2)"><h2>{{auth()->user()->type_issue(2)->count()}}</h2><h5>Casual</h5></button>
    <button type="button" class="btn btn-secondary btn-square-template"onclick="listFilter(3)"><h2>{{auth()->user()->type_issue(3)->count()}}</h2><h5>Feature</h5></button>
    <button type="button" class="btn btn-success btn-square-template"onclick="listFilter(4)"><h2>{{auth()->user()->solved_issues(false)->count()}}</h2><h5>Solved</h5></button>
</nav>
<br>
<div class="issue-list-container">
    <div id="all" style="display: none">
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
    <div id="critical" style="display: none">
        @foreach (auth()->user()->type_issue(1) as $issue)
            <div class="issue-list">
                <h1><a class="def-link link-info" href="/issue/{{$issue->id}}">{{$issue->title}}</a> <span class="badge  badge-pill badge-danger">{{$issue->project->name}}</span></h1>
                <h4>{{$issue->description}}</h4>
                <h6>Created: {{$issue->created_at}}</h6>
                <hr>
            </div>
        @endforeach
    </div>
    <div id="casual" style="display: none">
        @foreach (auth()->user()->type_issue(2) as $issue)
            <div class="issue-list">
                <h1><a class="def-link link-info" href="/issue/{{$issue->id}}">{{$issue->title}}</a> <span class="badge  badge-pill badge-warning">{{$issue->project->name}}</span></h1>
                <h4>{{$issue->description}}</h4>
                <h6>Created: {{$issue->created_at}}</h6>
                <hr>
            </div>
        @endforeach
    </div>
    <div id="feature" style="display: none">
        @foreach (auth()->user()->type_issue(3) as $issue)
            <div class="issue-list">
                <h1><a class="def-link link-info" href="/issue/{{$issue->id}}">{{$issue->title}}</a> <span class="badge  badge-pill badge-secondary">{{$issue->project->name}}</span></h1>
                <h4>{{$issue->description}}</h4>
                <h6>Created: {{$issue->created_at}}</h6>
                <hr>
            </div>
        @endforeach
    </div>
    <div id="solved" style="display: none">
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