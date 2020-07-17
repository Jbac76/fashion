@extends('admin.includes.layout')

@section('content')
        	<h2 class="mt-4">Add Category </h2>
        	<hr>


    <div class="row" >    

    <div class="col-xl-12 col-md-12" >
        
	<form action="" method="POST"  enctype="multipart/form-data">
        <!-- this div is for javascript validation -->
        <div id="errorDiv" align="center"></div>
        <!-- //this div is for javascript validation -->
        <div class="form-row">
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label class="large mb-1" for="title">Category Name</label>
                    <input class="form-control" id="title" type="text" name="cat_name" placeholder="Enter Category name" />                    
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label class="large mb-1" for="title">Category Descrtiption</label>
                    <textarea name="cat_desc" id="cat_desc" class="form-control">
                        
                    </textarea>                   
                </div>
            </div>
            
        </div>
        
                            
        </div>
        
        
        
        <div class="form-group mt-4 mb-0">
        	<button class="btn btn-primary" name="add_cat" type="submit">Add Category</button>
        </div>
    </form>
    </div>

@endsection