
@extends('baseSideNav')
@section('core')
<div class="container-fluid ">
    <br>
    <br>
    <div class="row d-flex justify-content-between">
        <div class="col-3">
            
        </div>
        <div class="col issue-list sm-form-body ">
            <div class="row d-flex justify-content-center">
                <h1>New User</h1>
            </div>
            <form method="post" action="/user/">
                @csrf
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-start">
                        <h5>Name</h5>
                    </div>
                    
                    
                </div>
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-center" >
                        <input class=" sm-form-input" type="text" name="name" id="" required>
                    </div>
                    <div class="col-1">
                        
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-start">
                        <h5>Email</h5>
                    </div>
                    
                    
                </div>
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-center" >
                        <input class=" sm-form-input" type="text" name="email" id="" required>
                    </div>
                    <div class="col-1">
                        
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-start">
                        <h5>Password</h5>
                    </div>
                    
                    
                </div>
                <div class="row">
                    <div class="col-1">
                        
                    </div>
                    <div class="col d-flex justify-content-center" >
                        <input class=" sm-form-input" type="text" name="password" id="password" required></li>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $("#password").val((Math.random() + 1).toString(36).substring(2));
    });
</script>
@endsection



