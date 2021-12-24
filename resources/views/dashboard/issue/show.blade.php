@php
$loopCount = 0
@endphp
@extends('baseSideNav')
@section('core')

<br>
<nav class="navbar navbar-dark issue-list">
    <div> 
        <h1 class="display-4">{{ $issue->title }}</h1>
        @if ($issue->type == 2)
            <div class="issue-list">
                <h2><span class="badge  badge-pill badge-warning">Casual</span></h2>
            </div>
        @endif
        @if ($issue->type == 3)
            <div class="issue-list">
                <h2><span class="badge  badge-pill badge-secondary">Feature</span></h2>
            </div>
        @endif
        @if ($issue->type == 1)
            <div class="issue-list">
                <h2><span class="badge  badge-pill badge-danger">Critical</span></h2>
            </div>
        @endif
    </div>
    
    <div style="width: 50%; ">
        <div class="row  d-flex justify-content-end">
            @if (auth()->user()->isAdmin() || auth()->user()->isDev())
                <form action="/issue/{{$issue->id}}/assign" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <button type="submit" class="btn btn-info btn-bug-template" style="color: #101010">
                        <i class="bi bi-trophy-fill"></i>Take
                    </button>
                </form>
            @endif
        </div>
        <div class="row pt-2  1d-flex justify-content-end" >
            @if ($issue->created_user_id == auth()->user()->id ||
            auth()->user()->isAdmin())
                <form id="delete" method="post" action="/issue/{{ $issue->id }}">
                    @method('delete')
                    @csrf
                    <button onclick="document.getElementById('delete').submit();" class="btn btn-danger btn-bug-template" >
                        <i class="bi bi-trash-fill"></i>Delete 
                    </button>
                </form>
            @endif
            @if ($issue->assigned_user_id == auth()->user()->id && $issue->status == 0)
                <a class="btn btn-success btn-bug-template" href="/issue/{{ $issue->id }}/close"><i class="bi bi-check"></i>Solve</a>
            @endif
        </div>
        <div class="row pt-1 d-flex justify-content-end" >
            @if (auth()->user()->isAdmin())
                <form action="/issue/{{$issue->id}}/assign" method="post"  >
                    @csrf
                    <select name="user_id" class="sm-form-input" style="width: 10rem">
                        @foreach ($issue->project->team->users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-info btn-bug-template" style="color: #101010">
                        <i class="bi bi-megaphone-fill"></i>Asign
                    </button>
                </form>
            @endif
        </div>
   </div>
</nav>
<br>
<div class="issue-list-container issue-list"  style="height: calc(100vh - 265px)">
    <table>
        <tr>
            <td class="bug-show-info-td"><b>Reported:</b> {{ $issue->created_by->name }}</td>
            <td class="bug-show-info-td">
               <b> Solver:</b>
                @if ($issue->assigned_user_id == 0)
                    Not Assigned
                @else
                    {{ $issue->assigned->name }}
                @endif
            </td>
            <td class="bug-show-info-td">
                <b>Project:</b> {{ $issue->project->name }}
            </td> 
        </tr>
    </table>
    <table>
        <tr>
            <td class="bug-show-info-td">
               <b> Reported:</b> {{ $issue->created_at }}
            </td>
            <td class="bug-show-info-td">
               <b> Last Update:</b> {{ $issue->updated_at }}
            </td>
        </tr>
    </table>
    <h3>Bug Description</h3>
    <div class="bug-show-info-description">{{ $issue->description }}</div>
    <hr>
    <div>
        <h4>Add Comment</h4>
        <form class="row d-flex justify-content-between"  style="width: 100%;" method="post" name="comments_form" id="comments_form" action="/issue/{{ $issue->id }}/note">
            @csrf
           <div class="col-4">
                <textarea  class="sm-form-input" name="comment" form="comments_form" placeholder="Komentár"></textarea><br>
                @if (auth()->user()->isAdmin() ||auth()->user()->isDev())
                    Intern Comment: <input type="checkbox" name="hidden_comment" id=""><br />        
                @endif
           </div>
           <div class="col-3 d-flex justify-content-end pr-1" > 
                <button type="submit" class="btn btn-info btn-bug-template align-self-center " style="color: #101010">
                    <i class="bi bi-chat-right-text-fill"></i>Post
                </button>
            </div>
        </form>
    </div>
    <hr>
    <h4>Uploaded Files</h4>
    @if (auth()->user()->isAdmin() ||
        auth()->user()->id == $issue->created_user_id)
        <form class="row d-flex justify-content-between"  style="width: 100%;" action="/file/upload" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-4">
                <label class="btn btn-info btn-bug-template" style="color: #101010">
                    <input type="file" name="file" id="">
                    <i class="bi bi-file-earmark-fill"></i>Choose File
                </label>
                <input type="hidden" name="issue_id" value="{{ $issue->id }}">
            </div>
            <div class="col-3 d-flex justify-content-end pr-1" > 
                <button type="submit" class="btn btn-info btn-bug-template align-self-start " style="color: #101010">
                    <i class="bi bi-file-earmark-arrow-up-fill"></i>Upload
                </button>
            </div>
        </form>
    @endif
    <ul >
        @foreach ($issue->files as $file)
            <li><b><a class="def-link link-info" href="/file/{{ $file->id }}">{{ $file->text }}</a></b> - {{ $file->user->name }} -
                {{ $file->created_at }}
                @if (auth()->user()->isAdmin() || auth()->user()->id == $file->user_id)
                    - <a class="badge badge-danger" href="/file/{{ $file->id }}/delete"> Delete</a>   
                @endif
            </li>
        @endforeach
    </ul>
    <hr>
    <h4>Comments</h4>
    @foreach ($issue->comments as $comment)
        @if ($comment->internal)
        @if (auth()->user()->isDev() || auth()->user()->isAdmin())
            <div class="pb-3 bug-show-info-description" style="background-color: #323232">
                <h5>
                    <b>{{ $comment->user->name }}</b>
                    <small>
                        -Intern Comment-
                        {{ $comment->created_at }}
                        <a class="badge badge-danger" href="/issue/note/delete/{{ $comment->id }}">Delete</a>
                    </small>
                </h5>
                {{ $comment->text }}
            </div>
            <br>    
        @endif
        @else   
            <div class="pb-3 bug-show-info-description" style="background-color: #323232">
                <h5>
                    <b>{{ $comment->user->name }}</b>
                    <small>
                        {{ $comment->created_at }}
                        <a class="badge badge-danger" href="/issue/note/delete/{{ $comment->id }}">Delete</a>
                    </small>
                </h5>
                {{ $comment->text }}
            </div>
            <br>
        @endif
    @endforeach
    
</div>

@endsection




