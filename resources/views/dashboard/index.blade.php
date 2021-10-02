<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <ul>
        <li><a href="/issue">Issues</a></li>
        <li><a href="/team">Teams</a></li>
        <li><a href="/project">Projects</a></li>
    </ul>
    @foreach (auth()->user()->all_issues() as $issue)
        {{$issue}};
    @endforeach
</body>
</html>