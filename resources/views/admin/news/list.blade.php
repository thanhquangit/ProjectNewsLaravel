@extends('admin.layout.index')
@section('content')
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">News
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
	                    <th>Title</th>
	                    <th>Slug</th>
	                    <th>Summary</th>
	                    <th>Content</th>
	                   	<th>HighLight</th>
	                   	<th>Qty View</th>
	                   	<th>Type</th>
	                   	<th>Image</th>
	                    <th>Delete</th>
	                    <th>Edit</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($news as $n)
		                <tr class="odd gradeX" align="center">
		                    <td>{{$n->id}}</td>
		                    <td>{{$n->title}}</td>
		                    <td>{{$n->slug}}</td>
		                    <td>{{$n->summary}}</td>
		                    <td>{{$n->content}}</td>
		                    <td>{{$n->highlight}}</td>
		                    <td>{{$n->quantity_view}}</td>
		                    <td>{{$n->type->type_nname}}</td>
		                    <td><img src="upload/tintuc/{{$n->image}}" width="100" height="50"></td>
		                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/news/delete/{{$n->id}}"> Delete</a></td>
		                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/news/edit/{{$n->id}}">Edit</a></td>
		                </tr>
		            @endforeach
	            </tbody>
	        </table>
	    </div>
	    <!-- /.row -->
	</div>
@endsection