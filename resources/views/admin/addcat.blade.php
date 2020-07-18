@extends('admin.includes.layout')

@section('content')
   
    <h2 class="mt-4">Add Category </h2>
    <hr>
    <div class="row">    
        <div class="col-xl-12 col-md-12">
            
            <form action="{{url('/savecat')}}" method="POST" >
                
                {{ csrf_field() }}
                
                <!-- this div is for javascript validation -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- //this div is for javascript validation -->
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label class="large mb-1" for="title">Category Name</label>
                            <input class="form-control" 
                                    id="title" 
                                    type="text" 
                                    name="cat_name" 
                                    placeholder="Enter Category name" 
                                    value="{{ old('cat_name') }}"
                                    required/>                    
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label class="large mb-1" for="title">Category Descrtiption</label>
                            <textarea 
                                name="cat_desc" 
                                id="cat_desc" 
                                placeholder="Enter Category name" 
                                class="form-control"
                                value="{{ old('cat_desc') }}"
                                required></textarea>                   
                        </div>
                    </div>                    
                </div>
                <button class="btn btn-primary" name="add_cat" type="submit">Add Category</button>
            </form>
        </div>
    </div>

@endsection