<form action="/project" method="post">
    <!-- CSRF TOKEN, ten tu musi byt lebo CSRF protection je by default zapnuta pri kazdom requeste inak error 413 -->
    @csrf
    <p>Nazov Projektu</p>
    <input type="text" name="name" required><br />
    <p>Vyber teamu</p>

    <select name="team">
        @foreach ($teams as $team)
            <option value="{{ $team->id }}" selected>{{ $team->name }}</option>
        @endforeach
    </select>

    <br>
    <input type="submit" value="Vytvorit projekt">
</form>
