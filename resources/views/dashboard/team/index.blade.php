@extends('baseSideNav')
@section('core')

<nav class="navbar navbar-dark issue-list">
    <h1>Teams</h1>
    <a class="btn btn-info btn-bug-template " style="color: #121212" type="submit" href="/team/create" ><i class="bi bi-bug-fill"></i>New Team</a>
</nav>

<a href="/team/create">Vytvorit novy team</a>
<table border=1>
    <tr>
        <td>Meno</td>
        <td>Pocet osob v teame</td>
    </tr>
    @foreach ($teams as $team)
        <tr>
            <td>
                <a href="team/{{$team->id}}">{{$team->name}}</a>
            </td>
            <td>{{$team->users->count()}}</td>
        </tr>
    @endforeach
</table>

@endsection