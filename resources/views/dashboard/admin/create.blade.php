
<form action="/user/" method="post">
    @csrf
    <ul>
        <li>Meno <input type="text" name="name" id="" required></li>
        <li>Email <input type="text" name="email" id="" required></li>
        <li>Heslo <input type="text" name="password" id="password" required></li>
    </ul>
    <input type="submit" value="Vytvorit">
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $("#password").val((Math.random() + 1).toString(36).substring(2));
    });
</script>

