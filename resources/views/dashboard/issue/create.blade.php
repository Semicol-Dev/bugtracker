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
                
                 <h1>Report Bug</h1>
                  
            </div>
            
            <form action="/issue" id="issue_form" name="issue_form" method="post">
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
                        <input class=" sm-form-input" type="text" name="title" id="">
                    </div>
                    <div class="col-1">
                            
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-start">
                        <h5>Project:</h5>
                    </div>
                    
                </div> 
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-center">
                        <select name="project"  class="sm-form-input">
                            @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-1">
                        
                    </div>
                    
                </div>
                <br>
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-start">
                        <h5>Type:</h5>
                    </div>
                    
                </div> 
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-center">
                        <select name="type" class="sm-form-input">
                            <option value="1" >Critical</option>
                            <option value="2" selected>Casual</option>
                            <option value="3">Feature</option>
                        </select>
                    </div>
                    <div class="col-1">
                        
                    </div>
                    
                </div>
                <br>
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-start">
                        <h5>Description:</h5>
                    </div>
                    
                </div> 
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-center">
                        <textarea  class="sm-form-input" name="description" form="issue_form">Popis bugu</textarea>
                    </div>
                    <div class="col-1">
                        
                    </div>
                    
                </div>
                <br>
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-center">
                        <button type="submit" class="btn btn-info btn-bug-template" style="color: #101010">
                            <i class="bi bi-bug-fill"></i>Report
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