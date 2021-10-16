<ul>
    <li>Email {{auth()->user()->email}}</li>
    <li>Name {{auth()->user()->name}}</li>
</ul>
<form method="post" action="/user/{{auth()->user()->id}}">
    {{ method_field('PUT') }}
    <h1>Password change</h1>
    @error('passwd')
        Passwords are not same
    @enderror
    <ul>
        @csrf
        <input type="hidden" name="action" value="password">
        <li>New password: <input type="password" name="pass1" required></li>
        <li>Confirm password: <input type="password" name="pass2" required></li>
    </ul>
    <input type="submit" value="submit">
</form>
<h1>Update avatar</h1>
<form method="post" enctype="multipart/form-data" action="/user/{{auth()->user()->id}}">
    {{ method_field('PUT') }}
    @csrf
    <input type="hidden" name="action" value="avatar">
    <input type="file" name="image" >
    <input type="submit" value="Odosli">
    </form>
<img style="width:200px" src="{{auth()->user()->picture}}" >
