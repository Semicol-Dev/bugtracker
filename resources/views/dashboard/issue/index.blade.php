@foreach ($issues->reverse() as $issue)
    {{$issue->title}}<br/>
@endforeach