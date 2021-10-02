<form action="/project/{{$project->id}}" method="post">
    @method('PUT')
    <!-- CSRF TOKEN, ten tu musi byt lebo CSRF protection je by default zapnuta pri kazdom requeste inak error 413 -->
    @csrf
    <p>Nazov Projektu</p>
    <input type="text" name="name" value="{{$project->name}}" required><br/>
    <p>Team</p>
    <select name="team">
        @foreach ($teams as $team)
            @if ($team->id == $project->team_id)
                <option value="{{$team->id}}" selected>{{$team->name}}</option>
            @else
                <option value="{{$team->id}}" selected>{{$team->name}}</option>
            @endif
        @endforeach
    </select>

    <br>
    <input type="submit" value="Upravit Projekt">
</form>