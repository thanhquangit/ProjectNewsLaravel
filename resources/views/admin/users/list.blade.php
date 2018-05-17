@extends('admin.layout.index')
@section('content')
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">Users
	                <small>List</small>
	            </h1>
	        </div>
	        <div class="row">
				@if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif

                <!-- In thong bao -->
                @if(session('notify'))
                    <div class="alert alert-success">
                        {{session('notify')}}
                    </div>
                @endif
        	</div>
	        <!-- /.col-lg-12 -->
	        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	            <thead>
	                <tr align="center">
	                    <th>ID</th>
	                    <th>Name</th>
	                    <th>Email</th>
	                    <th>Password</th>
	                    <th>Level</th>
	                    <th>Delete</th>
	                    <th>Edit</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($users as $us)
		                <tr class="odd gradeX" align="center">
		                    <td>{{$us->id}}</td>
		                    <td>{{$us->name}}</td>
		                    <td>{{$us->email}}</td>
		                    <td>{{$us->password}}</td>
							@if($us->level ==1)
		                    	<td>Admin</td>
		                    @else
		                    	<td>User</td>
		                    @endif
		                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/users/delete/{{$us->id}}"> Delete</a></td>
		                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/users/edit/{{$us->id}}">Edit</a></td>
		                </tr>
		            @endforeach
	            </tbody>
	        </table>
	    </div>
	    <!-- /.row -->
	</div>
@endsection