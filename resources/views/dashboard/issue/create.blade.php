@extends('baseTopNav')
@section('contentUnder')

<form action="/issue" id="issue_form" name="issue_form" method="post">
    @csrf
    Nazov: <input type="text" name="title" id=""><br>
    Projekt: 
    <select name="project" >
        @foreach ($projects as $project)
            <option value="{{$project->id}}">{{$project->name}}</option>
        @endforeach
    </select><br>
    Typ: 
    <select name="type" >
        <option value="1">Critical</option>
        <option value="2" selected>Casual</option>
        <option value="3">Feature</option>
    </select>
    <hr/>
    <textarea name="description" form="issue_form">Popis bugu</textarea>
    <input type="submit" value="Odoslať">
</form>

<form action="../../logout" method="post">
    @csrf
    <input type="submit" value="logout">
</form>
<!---
<form id="logout" action="../../logout" method="post">
    @csrf
</form>

@endsection