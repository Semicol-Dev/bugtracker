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
                
                 <h1>Create Team</h1>
                  
            </div>
            
            <form action="/team" method="post">
                
                <!-- CSRF TOKEN, ten tu musi byt lebo CSRF protection je by default zapnuta pri kazdom requeste inak error 413 -->
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
                        <input class=" sm-form-input" type="text" name="name"  required>
                    </div>
                    <div class="col-1">
                            
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-start">
                        <h5>Team Members:</h5>
                    </div>
                    
                </div> 
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-center">
                        <select class=" sm-form-input" name="members[]" multiple size="6" required>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}" id="">{{$user->name}}</option>
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
                    <div class="col d-flex justify-content-center">
                        <button type="submit" class="btn btn-info btn-bug-template" style="color: #101010">
                            <i class="bi bi-plus-circle-fill"></i>Create
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
