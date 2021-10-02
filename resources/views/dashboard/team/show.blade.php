<h1>{{$team->name}}</h1>

<h2>Pouzivatelia v Teame</h2>
<table border=1>
    <tr>
        <td>Nazov</td>
        <td>Email</td>
        <td>Privilegia</td>
    </tr>
    @foreach ($team->users as $user)
        <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        </tr>
    @endforeach
</table>

<h2>Projekty Teamu</h2>
<table border=1>
    <tr>
        <td>
            <strong>Nazov Projektu</strong>
        </td>
    </tr>
    
    @foreach ($team->projects as $project)
        <tr>
            <td>
                {{$project->name}}
            </td>
        </tr>
    @endforeach
</table>


@if (auth()->user()->isAdmin())
    <a href="/team/{{$team->id}}/edit">Editovat</a>
    <form id="delete" method="post" action="/team/{{$team->id}}">
        @method('delete')
        @csrf
        <a href="#" onclick="document.getElementById('delete').submit();">Zmazat</a>
    </form>
@endif