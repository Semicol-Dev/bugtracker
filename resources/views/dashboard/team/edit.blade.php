<form action="/team/{{$team->id}}" method="post">
    @method('PUT')
    <!-- CSRF TOKEN, ten tu musi byt lebo CSRF protection je by default zapnuta pri kazdom requeste inak error 413 -->
    @csrf
    <p>Nazov Teamu</p>
    <input type="text" name="name" value="{{$team->name}}" required><br/>
    <p>Vyber uzivatelov do teamu</p>
        
    <select name="members[]" multiple size="6">
        @foreach ($users as $user)
            @if ($team->contain_user($user->id))
                <option value="{{$user->id}}" id="" selected>{{$user->name}}</option>
            @else
                <option value="{{$user->id}}" id="">{{$user->name}}</option>
            @endif
        @endforeach
    </select>

    <br>
    <input type="submit" value="Vytvorit team">
</form>