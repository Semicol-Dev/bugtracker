@extends('baseSideNav')
@section('core')
<div class="container-fluid ">
    <br>
    <br>
    <div class="row d-flex justify-content-between">
        <div class="col-3">
            
        </div>
        <div class="col issue-list sm-form-body " >
            <div class="row d-flex justify-content-center">
                
                 <h1>Create Project</h1>
                  
            </div>
            
            <form action="/project" method="post">
                @csrf
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-start">
                        <h5>Name:</h5>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-center" >
                        <input class=" sm-form-input" type="text" name="name" required @if ($teams->count() == 0) disabled @endif>
                    </div>
                    <div class="col-1">
                            
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-start">
                        <h5>Team:</h5>
                    </div>
                    
                </div> 
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-center">
                        @if (($teams->count() == 0 ))
                            <p class="text-danger">If you want to creat project, you have to <br><a class="def-link" href="/team/create">create team</a></p>
                        @else
                            <select name="team" class="sm-form-input">
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}" selected>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div class="col-1">
                        
                    </div>
                    
                </div>
                <br>
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-center">
                        <button @if ($teams->count() == 0 ) disabled @endif type="submit" class="btn btn-info btn-bug-template" style="color: #101010">
                            <i class="bi bi-plus-circle-fill""></i>Create
                        </button>
                    </div>
                    <div class="col-1">
                        
                    </div>
                    
                </div>
            </form>

        </div>
        <div class="col-3">
            
        </div>
    </div>
</div>
@endsection

