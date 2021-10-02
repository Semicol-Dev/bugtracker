<a href="/issue/create">Vytvorit novy ticket</a>
<ul>
@foreach ($issues as $issue)
    <li>
        <a href="/issue/{{$issue->id}}">{{$issue->title}}</a>    
    </li>    
@endforeach
</ul>