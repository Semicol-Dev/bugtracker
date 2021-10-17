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
    <button type="button" class="btn btn-success btn-square-template"><h2>25</h2><h5>Solved</h5></button>
</nav>
@foreach (auth()->user()->my_issues() as $issue)
{{$issue->title}} <!-- title of ticket-->
{{Str::limit($issue->description, 20)}} <!-- trim description to 20 chars-->
{{$issue->type}} <!-- 1 Critical, 2 Casual, 3 Feature-->
{{$issue->status}} <!-- 1 = solved -->
{{$issue->assigned->name}} <!-- who have assigned ticket -->
{{$issue->created_by->name}} <!-- who created a ticket-->
{{$issue->created_at}} <!-- when ticket was made -->
{{$issue->updated_at}} <!-- last update -->

@endforeach
<div id="all">
    @foreach (auth()->user()->my_issues() as $issue)
    <h1>{{$issue->title}}</h1>
    <h3>{{$issue->description}}</h3>
    @endforeach
</div>
<div id="critical">
    @foreach (auth()->user()->type_issue(1) as $issue)
    <h1>{{$issue->title}}</h1>
    <h3>{{$issue->description}}</h3>
    @endforeach
</div>
<div id="casual">
    @foreach (auth()->user()->type_issue(2) as $issue)
    <h1>{{$issue->title}}</h1>
    <h3>{{$issue->description}}</h3>
    @endforeach
</div>
<div id="feature">
    @foreach (auth()->user()->type_issue(3) as $issue)
    <h1>{{$issue->title}}</h1>
    <h3>{{$issue->description}}</h3>
    @endforeach
</div>
@endsection