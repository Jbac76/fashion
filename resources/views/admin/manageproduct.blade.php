@extends('admin.includes.layout')

@section('content')
    <h2 class="mt-4">Products Management </h2>
    <hr>
    <div class="form_actions_count">
        <p>Found: <span>{{ $products->count() }} Products</span></p>
    </div>

    <div class="clear"></div>

    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th class="td_checkbox">
                    #
                </th>

                <th>
                    Name
                </th>
                <th>
                    Descritpion
                </th>  
                <th>
                    Image
                </th>     
                <th>
                    Price
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Quality
                </th>
                <th>
                    Category
                </th>
                <th>
                    Status
                </th>            
                <th>
                    Added On
                </th>
                
                <th data-hide="phone">Actions</th>
            </tr>
        </thead>
        <tbody>
        
            <!-- to be looped for getting all categories -->
            @if( $products->count() >= 1 )
            
                @foreach ( $products as $product )

                    <tr class="table_row">
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $product->name }}
                        </td>

                        <td>
                            {{ $product->description }}
                        </td>  
                        <td>
                            <img src="/images/products/{{ $product->photo }}" width="30" height="30">
                        </td>
                        <td>
                            {{ $product->price }}
                        </td> 
                        <td>
                            {{ $product->quantity }}
                        </td>    
                        <td>
                            {{ $product->quality }}
                        </td>
                        <td>
                            {{ $product->category->name }}
                        </td>
                        <td>
                            @if($product->count() >= 1)
                                <span class="btn btn-sm btn-primary">Available</span>
                            @else
                                <span class="btn btn-sm btn-warning">Not Available</span>
                            @endif
                        </td>
                        <td>
                            {{$product->created_at->diffForHumans()}}
                        </td>  
                        
                        <td>
                            <a href="{{ route('editproduct', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i></a>
                            <a href="{{ route('deleteproduct', $product->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure??');"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach

            @endif
        </tbody>
    </table>

    @unless( $products->count() >= 1 )

        <div class="alert alert-warning">
            No Categories Found
        </div>

    @endunless

    
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable();
        } );
    </script>
    @endsection