<h1>Vsetky Projekt</h1>
@if (auth()->user()->isAdmin())
    <a href="/project/create">Vytvorit novy Projekt</a>
@endif

<table border=1>
    <tr>
        <td>Meno</td>
        <td>Team</td>
    </tr>
    @foreach ($projects as $project)
        <tr>
            <td>
                <a href="project/{{$project->id}}">{{$project->name}}</a>
            </td>
            <td>
                <a href="/team/{{$project->team->id}}">{{$project->team->name}}</a>
            </td>
        </tr>
    @endforeach
</table>


