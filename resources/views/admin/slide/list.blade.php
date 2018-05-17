@extends('admin.layout.index')
@section('content')
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">Slide
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
	                    <th>Image</th>
	                    <th>Link</th>
	                    <th>Delete</th>
	                    <th>Edit</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($slide as $sl)
		                <tr class="odd gradeX" align="center">
		                    <td>{{$sl->id}}</td>
		                    <td>{{$sl->name}}</td>
		                    <td><img src="upload/slide/{{$sl->image}}" width="300" height="100"></td>
		                    <td>{{$sl->link}}</td>
		                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/delete/{{$sl->id}}"> Delete</a></td>
		                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/edit/{{$sl->id}}">Edit</a></td>
		                </tr>
		            @endforeach
	            </tbody>
	        </table>
	    </div>
	    <!-- /.row -->
	</div>
@endsection