@extends('admin.includes.layout')

@section('content')
        	<h2 class="mt-4">Categories Management </h2>
        	<hr>
        	<div class="form_actions_count">
                <p>Found: <span><?php //echo $nr; ?>X articles</span></p>
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
    
    <tr class="table_row">
        <td>
        1
        </td>
        <td>
           Fashion
        </td>

        <td>
            Desc
        </td>       
        <td>
            available
        </td>
         <td>
             2days ago
         </td>  
        
        <td>
        <a href="" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i></a>
        <a href="" class="btn btn-danger btn-sm" onclick="return confirm('are you sure??');"><i class="fa fa-trash"></i></a>
        </td>
        </tr>
        
    </tbody>
    </table>

 
<script>
    $(document).ready(function() {
    $('#dataTables-example').DataTable();
} );
    </script>
@endsection