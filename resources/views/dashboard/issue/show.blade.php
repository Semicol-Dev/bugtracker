<h1>{{$issue->title}}</h1>
<table border=1>
    <tr>
        <td>Vytvoril: {{$issue->created_by->name}}</td>
        <td>
            Rieši: 
            @if ($issue->assigned_user_id == 0)
                Nepridelené
            @else
                {{$issue->assigned->name}}
            @endif
        </td>
        <td>
            Projekt: {{$issue->project->name}}
        </td>
        <td>
            Vytvorené: {{$issue->created_at}}
        </td>
        <td>
            Posledná aktualizácia: {{$issue->updated_at}}
        </td>
    </tr>
</table>
<br>
<h3>Popis problému</h3>
<table border=1>
    <tr>
        <td>{{$issue->description}}</td>
    </tr>
</table>
<hr>
<h4>Komentáre</h4>
<form method="post" name="comments_form" id="comments_form" action="/issue/{{$issue->id}}/note">
    @csrf
    <textarea name="comment" form="comments_form" placeholder="Komentár"></textarea><br>
    Interny komentar: <input type="checkbox" name="hidden_comment" id=""><br/>
    <input type="submit" value="Odoslat komentar">
</form>

<hr>
<h4>Nahrane subory</h4>
    @if (auth()->user()->isAdmin() || (auth()->user()->id == $issue->user_id))
    <form action="/file/upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="">
        <input type="hidden" name="issue_id" value="{{$issue->id}}">
        <input type="submit" value="Nahrat subor">
    </form>
    @endif

    <ul>
    @foreach ($issue->files as $file)
        <li><a href="/file/{{$file->id}}">{{$file->text}}</a> - {{$file->user->name}} - {{$file->created_at}} 
        @if (auth()->user()->isAdmin() || (auth()->user()->id == $file->user_id))
            - <a href="/file/{{$file->id}}/delete">Zmazat</a>
        @endif
            
        </li>
    @endforeach
    </ul>
<hr>

@foreach ($issue->comments as $comment)
@if ($comment->internal)
    @if (auth()->user()->isDev() || auth()->user()->isAdmin())
    <hr>
    <table border=1>
        <tr>
            <td>{{$comment->user->name}}</td>
            <td>{{$comment->created_at}}</td>
            <td>Interny komentar</td>                
            <td><a href="/issue/note/delete/{{$comment->id}}">Zmazat</a></td>
        </tr>
        <tr>
            <td>
                {{$comment->text}}
            </td>
        </tr>
    </table>
    @endif 
@else
    <hr>
    <table border=1>
        <tr>
            <td>{{$comment->user->name}}</td>
            <td>{{$comment->created_at}}</td>            
            <td><a href="/issue/note/delete/{{$comment->id}}">Zmazat</a></td>
        </tr>
        <tr>
            <td>
                {{$comment->text}}
            </td>
        </tr>
    </table>
@endif
@endforeach