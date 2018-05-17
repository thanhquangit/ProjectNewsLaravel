@extends('admin.layout.index')
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Slide
            <small>Edit</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="admin/slide/edit/{{$slide->id}}" method="POST" enctype="multipart/form-data">
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
                <label>Name</label>
                <input class="form-control" name="name" value="{{$slide->name}}" />
            </div>
            <div class="form-group">
                <label>Link</label>
                <input class="form-control" name="link" value="{{$slide->link}}" />
            </div>
            <div class="form-group">
                <label for="first-name">Content<span class="required">*</span></label>
                <div>
                    <textarea class="form-control ckeditor" name="content" id="content">{{$slide->content}}</textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'content');
                      </script>﻿
                </div>
            </div>
            <div class="form-group">
                <label>Image</label>
                <p> <img src="upload/slide/{{$slide->image}}" style="width: 100%; height: 100%;"/> </p>
                <input class="form-control" type="file" name="image" />
            </div>
            <button type="submit" class="btn btn-primary"> Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        <form>
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