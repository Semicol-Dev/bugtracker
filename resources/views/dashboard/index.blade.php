@extends('baseLayout')
@section('title')
    index
@endsection
@section('core')

<h1>Issues</h1>
@foreach (auth()->user()->all_issues() as $issue)
    {{$issue}};
@endforeach
@endsection