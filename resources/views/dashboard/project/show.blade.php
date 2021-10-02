<h1>{{$project->name}}</h1>
<h2>Team: {{$project->team->name}}</h2>

<h2>Bug reporty projektu</h2>
<table border=1>
    <tr>
        <td>
            <strong>Title</strong>
        </td>
    </tr>
</table>

@if (auth()->user()->isAdmin())
    <a href="/project/{{$project->id}}/edit">Editovat</a>
    <form id="delete" method="post" action="/project/{{$project->id}}">
        @method('delete')
        @csrf
        <a href="#" onclick="document.getElementById('delete').submit();">Zmazat</a>
    </form>
@endif