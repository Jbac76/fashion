@extends('admin.includes.layout')

@section('content')
 
    <h2 class="mt-4">Edit Category </h2>
    <hr>


    <div class="row" >    

        <div class="col-xl-12 col-md-12" >
            @if($category)
                <form action="{{url('/updatecat',$category->id)}}" method="POST" >
                    
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="large mb-1" for="title">Category Name</label>
                                <input 
                                    class="form-control" 
                                    id="title" 
                                    type="text" 
                                    name="cat_name" 
                                    value="{{ $category->name }}"
                                    required/>                    
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="large mb-1" for="title">Category Descrtiption</label>
                                <textarea name="cat_desc" id="cat_desc" class="form-control" required>{{ $category->description }}</textarea>                   
                            </div>
                        </div>            
                    </div>
                    
                    <div class="form-group mt-4 mb-0">
                        <button class="btn btn-primary" name="add_cat" type="submit">Update Category</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection