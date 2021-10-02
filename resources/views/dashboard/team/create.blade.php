<form action="/team" method="post">
    <!-- CSRF TOKEN, ten tu musi byt lebo CSRF protection je by default zapnuta pri kazdom requeste inak error 413 -->
    @csrf
    <p>Nazov Teamu</p>
    <input type="text" name="name" required><br/>
    <p>Vyber uzivatelov do teamu</p>
        <!-- Laravel style foreach, posiem z backendu $users ktora obsahuje vsetkych existujucich uzivatelov ak chces vydiet aky je output z backendu odkomentuj riadok pod tymto-->
        <!-- {{$users}} -->
    
    <select name="members[]" multiple size="6">
        @foreach ($users as $user)
            <option value="{{$user->id}}" id="">{{$user->name}}</option>
        @endforeach
    </select>

    <br>
    <input type="submit" value="Vytvorit team">
</form>