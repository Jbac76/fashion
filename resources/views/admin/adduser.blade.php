@extends('admin.includes.layout')

@section('content')
    <div class="container-fluid">
    
        <h2 class="mt-4">Add System User </h2>
        
        <hr>

        <div class="row" >
        
            <div class="col-xl-12 col-md-12" >
                
                <h4>Add Single Staff</h4>
                
                <form action="{{url('/saveuser')}}" method="POST">
                    
                    {{csrf_field()}}
                    
                    <!-- this div is for javascript validation -->
                    <div id="errorDiv" align="center"></div>
                    
                    <!-- //this div is for javascript validation -->
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="dname">Name</label>
                                <input class="form-control" id="inputFirstName" type="text" name="name" placeholder="Enter Name" />
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="dcolege">Email</label>
                                <input class="form-control" id="email" type="email" name="email" placeholder="Enter email" />
                            
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
                        <button class="btn btn-primary" name="AddUser" type="submit">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection