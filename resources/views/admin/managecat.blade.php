@extends('admin.includes.layout')

@section('content')
        	<h2 class="mt-4">Categories Management </h2>
        	<hr>
        	<div class="form_actions_count">
                <p>Found: <span>{{count($categories)}} articles</span></p>
            </div>

            <div class="clear"></div>

            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th class="td_checkbox">
                #
            </th>

            <th>
                Title
            </th>

            <th>
                Descritpion
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
    @if($categories)
    
    @foreach($categories as $cat)
    <tr class="table_row">
        <td>
        {{$loop->iteration}}
        </td>
        <td>
           {{$cat->name}}
        </td>

        <td>
            {{$cat->description}}
        </td>       
        <td>
            @if($cat->status == 1)
                <span class="btn btn-sm btn-primary">Available</span>
            @else
                <span class="btn btn-sm btn-warning">Not Available</span>
            @endif
        </td>
         <td>
             {{$cat->created_at}}
         </td>  
        
        <td>
        <a href="{{URL::to('/cat/edit/'.$cat->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i></a>
        <a href="{{URL::to('/cat/del/'.$cat->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure??');"><i class="fa fa-trash"></i></a>
        </td>
        </tr>
        @endforeach
        @else
        <tr><td>No Category</td></tr>
        @endif
    </tbody>
    </table>

 
<script>
    $(document).ready(function() {
    $('#dataTables-example').DataTable();
} );
    </script>
@endsection