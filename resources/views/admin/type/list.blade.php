@extends('admin.layout.index')
@section('content')
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">Type
	                <small>List</small>
	            </h1>
	        </div>
	        
	        <!-- /.col-lg-12 -->
	        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	            <thead>
	                <tr align="center">
	                    <th>ID</th>
	                    <th>Type Name</th>
	                    <th>Type Slug</th>
	                    <th>Category Name</th>
	                    <th>Delete</th>
	                    <th>Edit</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($type as $t)
	                <tr class="odd gradeX" align="center">
	                    <td>{{$t->id}}</td>
	                    <td>{{$t->type_nname}}</td>
	                    <td>{{$t->type_slug}}</td>
	                    <td>{{$t->category->category_name}}</td>
	                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/type/delete/{{$t->id}}"> Delete</a></td>
	                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/type/edit/{{$t->id}}">Edit</a></td>
	                </tr>
	                @endforeach
	            </tbody>
	        </table>
	    </div>
	    <!-- /.row -->
	</div>
@endsection