@extends('admin.includes.layout')

@section('content')

    <h2 class="mt-4">Product Category </h2>
    <hr>


    <div class="row" >    

        <div class="col-xl-12 col-md-12" >
            @if($products)
                <form action="{{ route('updateproduct',$products->id) }}" enctype="multipart/form-data" method="POST" >
                    
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
                                <label class="large mb-1" for="title">Product Name</label>
                                <input class="form-control" 
                                        type="text" 
                                        name="product_name" 
                                        placeholder="Enter Product name" 
                                        value="{{ $products->name }}"
                                        required/>                    
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="large mb-1" for="title">Product Descrtiption</label>
                                <textarea 
                                    name="product_desc"
                                    placeholder="Enter Product Descrtiption" 
                                    class="form-control"
                                    required>{{ $products->description }}</textarea>                   
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="large mb-1" for="title">Product Price</label>
                                <input class="form-control"  
                                        type="text" 
                                        name="product_price" 
                                        placeholder="Enter Product Price" 
                                        value="{{ $products->price }}"
                                        required/>                    
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="large mb-1" for="title">Product Quantity</label>
                                <input class="form-control"
                                        type="text" 
                                        name="product_quantity" 
                                        placeholder="Enter Product Quantity" 
                                        value="{{ $products->quantity }}"
                                        required/>                    
                            </div>
                        </div>
                    </div>
                    <div class="form-row">    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="large mb-1" for="title">Product Quality</label>
                                <input class="form-control"  
                                        type="text" 
                                        name="product_quality" 
                                        placeholder="Enter Product Quality" 
                                        value="{{ $products->quality }}"
                                        required/>                    
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="large mb-1" for="title">Product Category</label>
                                <select class="form-control" name="product_category">
                                    <option>Choose Categoty</option>
                                    @foreach($categories as $category)
                                    <option 
                                        value="{{ $category->id }}" 
                                        {{ $products->category_id == $category->id ? 'selected' : ''  }}> 
                                        {{ $category->name }} 
                                    </option>
                                    @endforeach
                                </select>                  
                            </div>
                        </div>                
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="large mb-1" for="file">Product Image</label>
                                <input 
                                    type="file" 
                                    name="product_image" 
                                    class="form-control"
                                    value="{{ old('product_image') }}"
                                    required />
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" name="add_product" type="submit">Add Product</button>
                </form>
            @endif
        </div>
    </div>
@endsection