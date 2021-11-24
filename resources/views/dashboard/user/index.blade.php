@extends('baseSideNav')
@section('core')
<div class="container-fluid ">
    <br>
    <br>
    <div class="row d-flex justify-content-between">
        <div class="col-3">
            
        </div>
        <div class="col issue-list sm-form-body ">
              <!--- <div class="row d-flex justify-content-center">
                   <h5>
                        <ul>
                            <li>Email {{auth()->user()->email}}</li>
                            <li>Name {{auth()->user()->name}}</li>
                        </ul>
                   </h5>
                </div> -->
                <form method="post" action="/user/{{auth()->user()->id}}/password">
                    <div class="col d-flex justify-content-start">
                        <div class="col d-flex justify-content-center">
                            {{ method_field('PUT') }}
                            <h1>Password change</h1>
                            @error('passwd')
                                Passwords are not same
                            @enderror
                        </div>
                    </div>
                    @csrf
                    <input type="hidden" name="action" value="password">
                    <div class="row">
                        <div class="col-1">
                            
                        </div>
                        <div class="col d-flex justify-content-start">
                            <h5>New Password</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            
                        </div>
                        <div class="col d-flex justify-content-center">
                            <input class=" sm-form-input" type="password" name="pass1" required>
                        </div>
                        <div class="col-1">
                            
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-1">
                            
                        </div>
                        <div class="col d-flex justify-content-start">
                            <h5>Confirm password:</h5>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-1">
                            
                        </div>
                        <div class="col d-flex justify-content-center">
                            <input class=" sm-form-input"  type="password" name="pass2" required>
                        </div>
                        <div class="col-1">
                            
                        </div>
                    </div>
                    <br>      
                    <div class="row">
                        <div class="col-1">
                            
                        </div>
                        <div class="col d-flex justify-content-center">
                            <button type="submit" value="submit" class="btn btn-info btn-bug-template" style="color: #101010">
                                <i class="bi bi-asterisk"></i>Change
                            </button>
                        </div>
                        <div class="col-1">
                            
                        </div>
                        
                    </div>
                    
                </form>
            <!--    <div class="row d-flex justify-content-center">
                    <h1>Update avatar</h1>
                </div>
                <form method="post" enctype="multipart/form-data" action="/user/{{auth()->user()->id}}/avatar">
                    {{ method_field('PUT') }}
                    @csrf
                    <input type="hidden" name="action" value="avatar">
                    <input type="file" name="image" >
                    <input type="submit" value="Odosli">
                </form>
                <img style="width:200px" src="{{auth()->user()->picture}}" > -->
        </div>
        <div class="col-3">
            
        </div>
    </div>
</div>
@endsection