@extends('admin.includes.layout')

@section('content')
        	<h2 class="mt-4">Edit Category </h2>
        	<hr>


    <div class="row" >    

    <div class="col-xl-12 col-md-12" >
        @if($cats)
	<form action="{{url('/updatecat',$cats->id)}}" method="POST" >
        {{ csrf_field() }}
        <!-- this div is for javascript validation -->
        <div id="errorDiv" align="center"></div>
        <!-- //this div is for javascript validation -->
        <div class="form-row">
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label class="large mb-1" for="title">Category Name</label>
                    <input class="form-control" id="title" type="text" name="cat_name" value="{{$cats->name}}" />                    
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label class="large mb-1" for="title">Category Descrtiption</label>
                    <textarea name="cat_desc" id="cat_desc" class="form-control">
                        {{$cats->description}}
                    </textarea>                   
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label class="large mb-1" for="title">Category Status</label>
                    <select class="form-control" name="status">
                        <option>Choose From List</option>
                        <option value="1" {{$cats->status == 1 ? 'selected' : ''}}>Availavle</option>
                        <option value="0" {{$cats->status == 0 ? 'selected' : ''}}>Not Available</option>
                    </select>
                </div>
            </div>
            
        </div>
        
                            
        </div>
        
        
        
        <div class="form-group mt-4 mb-0">
        	<button class="btn btn-primary" name="add_cat" type="submit">Update Category</button>
        </div>
    </form>
    @else
        <h1>NO DATA FOUND</h1>
    @endif
    </div>

@endsection