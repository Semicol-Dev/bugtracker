<h1>Vsetky Teamy</h1>
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


