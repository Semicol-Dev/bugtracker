<ul>
@foreach ($issues as $issue)
    <li>{{$issue->title}}</li>
@endforeach
</ul>