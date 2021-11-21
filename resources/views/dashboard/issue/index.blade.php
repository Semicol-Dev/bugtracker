<a href="/issue/create">Vytvorit novy ticket</a>
<table border="3">
@foreach ($issues as $issue)
    <tr>
        <td>
            <a href="/issue/{{$issue->id}}">{{$issue->title}}</a>
        </td>
        <td>
            @switch($issue->type)
                @case(1)
                    Critical
                    @break
                @case(2)
                    Casual                    
                    @break
                @case(3)
                    Feature
                    @break
                @default
                    
            @endswitch
        </td>
        <td>
            @if ($issue->status)
                Ukonceny
            @endif
        </td>
        <td>
            {{$issue->updated_at}}
        </td>
    </tr>
    <tr>
        <td>
            @php
                echo substr($issue->description, 0, 100);
            @endphp
        </td>
    </tr>              
@endforeach
</table>