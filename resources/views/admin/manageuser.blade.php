@extends('admin.includes.layout')

@section('content')
        	<h2 class="mt-4">User Management </h2>
        	<hr>
        	<div class="form_actions_count">
                <p>Found: <span>{{count($users)}} Users</span></p>
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
                Email
            </th>       

         
           
            <th>
            	Added On
            </th>
            
            <th data-hide="phone">Actions</th>
        </tr>
    </thead>
    <tbody>
  <!-- to be looped for getting all categories -->
    @if($users)
    
    @foreach($users as $user)
    <tr class="table_row">
        <td>
        {{$loop->iteration}}
        </td>
        <td>
           {{$user->name}}
        </td>

        <td>
            {{$user->email}}
        </td>       
        
         <td>
             {{$user->created_at}}
         </td>  
        
        <td>
        <a href="{{URL::to('/user/edit/'.$user->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i></a>
        <a href="{{URL::to('/user/del/'.$user->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure??');"><i class="fa fa-trash"></i></a>
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