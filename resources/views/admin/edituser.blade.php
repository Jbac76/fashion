@extends('admin.includes.layout')

@section('content')
        	
            <h2 class="mt-4">Edit System User </h2>
            <hr>
    <div class="row" >
    
    

    <div class="col-xl-12 col-md-12" >
        @if($users)
    <form action="{{url('/updateuser',$users->id)}}" method="POST">
        {{csrf_field()}}
        <!-- this div is for javascript validation -->
        <div id="errorDiv" align="center"></div>
        <!-- //this div is for javascript validation -->
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="dname">Name</label>
                    <input class="form-control" id="inputFirstName" type="text" name="name" value="{{$users->name}}" />
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="dcolege">Email</label>
                    <input class="form-control" id="email" type="email" name="email" value="{{$users->email}}" />
                   
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="dcolege">Password</label>
                    <input class="form-control" id="inputPassword" type="password" name="pass" placeholder="Enter Password" />
                   
                </div>
            </div> 
             <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="dcolege">Confirm Password</label>
                    <input class="form-control" id="inputPassword" type="password" name="cpass" placeholder="Enter Password" />
                   
                </div>
            </div>                
        </div>
        
        <div class="form-group mt-4 mb-0">
            <button class="btn btn-primary" name="UpdateUser" type="submit">Add User</button>
        </div>
    </form>
    @else
    <h1>No user</h1>
    @endif
    </div>



@endsection