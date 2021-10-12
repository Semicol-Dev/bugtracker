@extends('baseLayout')
@section('title')
    index
@endsection
@section('core')
<ul>
    <li><a href="/issue">Issues</a></li>
    <li><a href="/team">Teams</a></li>
    <li><a href="/project">Projects</a></li>
</ul>
<h1>Issues</h1>
@foreach (auth()->user()->all_issues() as $issue)
    {{$issue}};
@endforeach
@endsection