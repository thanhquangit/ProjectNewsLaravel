@extends('admin.layout.index')
@section('content')
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">Category
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
	                    <th>Category Name</th>
	                    <th>Category Slug</th>
	                    <th>Delete</th>
	                    <th>Edit</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($category as $ct)
		                <tr class="odd gradeX" align="center">
		                    <td>{{$ct->id}}</td>
		                    <td>{{$ct->category_name}}</td>
		                    <td>{{$ct->category_slug}}</td>
		                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/category/delete/{{$ct->id}}"> Delete</a></td>
		                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/category/edit/{{$ct->id}}">Edit</a></td>
		                </tr>
		            @endforeach
	            </tbody>
	        </table>
	    </div>
	    <!-- /.row -->
	</div>
@endsection