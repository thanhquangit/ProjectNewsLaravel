@extends('admin.layout.index')
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">News
            <small>Edit</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="admin/news/edit/{{$news->id}}" method="POST" enctype="multipart/form-data">
        	<input type="hidden" name="_token" value="{{csrf_token()}}" />
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
            <div class="form-group">
                <label>Title</label>
                <input class="form-control" name="title" value="{{$news->title}}" />
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category" id="category">
                    <option value="0">Select Category</option>
                    @foreach($category as $ct)
                        <option 
                            @if($news->type->category->id == $ct->id)
                                {{"selected"}}
                            @endif
                        value="{{$ct->id}}">{{$ct->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="type" id="type">
                    <option value="0">Select Type</option>
                    @foreach($type as $t)
                        <option
                            @if($news->type->id == $t->id)
                                {{"selected"}}
                            @endif
                        value="{{$t->id}}">{{$t->type_nname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Summary</label>
                <textarea rows="4" class="form-control" name="summary">{{$news->summary}}</textarea>
            </div>
            <div class="form-group">
                <label for="first-name">Content<span class="required">*</span></label>
                <div>
                    <textarea class="form-control ckeditor" name="content" id="content">{{$news->content}}</textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'content');
                      </script>﻿
                </div>
            </div>
            <div class="form-group">
                <label>Image</label>
                <p> <img src="upload/tintuc/{{$news->image}}" style="width: 100%; height: 100%;"/> </p>
                <input class="form-control" type="file" name="image" />
            </div>
            <div class="form-group">
                <label>Highlight</label>
                @if($news->highlight == 0)
                    <label class="radio-inline">
                        <input type="radio" name="highlight" checked="" value="0">Not Hot
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="highlight" value="1">Hot
                    </label>
                @else
                    <label class="radio-inline">
                        <input type="radio" name="highlight" value="0">Not Hot
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="highlight" checked="" value="1">Hot
                    </label>
                @endif
            </div>
            <button type="submit" class="btn btn-primary"> Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        <form>


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Comment
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>User</th>
                        <th>Content</th>
                        <th>Time</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news->comment as $cm)
                        <tr class="odd gradeX" align="center">
                            <td>{{$cm->id}}</td>
                            <td>{{$cm->users->name}}</td>
                            <td>{{$cm->content}}</td>
                            <td>{{$cm->created_at}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/delete/{{$cm->id}}/{{$news->id}}"> Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.row -->
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $("#category").change(function(){
            var idCategory = $(this).val();
            $.get("admin/ajax/type/"+idCategory,function(data){
                $("#type").html(data);
            })
        });
    });
</script>  
@endsection