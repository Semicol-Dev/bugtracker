<a href="/user/create">Pridat Pouzivatela</a>

<ul>
@foreach ($users as $user)
    <li>{{$user->name}} - <a href="/user/{{$user->id}}/destroy">Zmazat</a></li>
@endforeach
</ul>