<form action="/project" method="post">
    <!-- CSRF TOKEN, ten tu musi byt lebo CSRF protection je by default zapnuta pri kazdom requeste inak error 413 -->
    @csrf
    <p>Nazov Projektu</p>
    <input type="text" name="name" required @if ($teams->count() == 0) disabled @endif><br />
    <p>Vyber teamu</p>
     
    @if (($teams->count() == 0))
        <p>Nemozete vytvorit projekt bez toho aby ste vytvorili najprv team, prosim <a href="/team/create">vytvorte team</a></p>
    @else
    <select name="team">
        @foreach ($teams as $team)
            <option value="{{ $team->id }}" selected>{{ $team->name }}</option>
        @endforeach
    </select>
    @endif


    <br>
    <input @if ($teams->count() == 0) disabled @endif type="submit" value="Vytvorit projekt">
</form>
