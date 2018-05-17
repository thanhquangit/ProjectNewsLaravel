@extends('admin.layout.index')
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">News
            <small>Add</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="admin/news/add" method="POST" enctype="multipart/form-data">
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
                <input class="form-control" name="title" placeholder="Please Enter Username" />
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category" id="category">
                    <option>Select Category</option>
                    @foreach($category as $ct)
                        <option value="{{$ct->id}}">{{$ct->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="type" id="type">
                    <option>Select Type</option>
                    @foreach($type as $t)
                        <option value="{{$t->id}}">{{$t->type_nname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Summary</label>
                <textarea rows="4" class="form-control" name="summary"></textarea>
            </div>
            <div class="form-group">
                <label for="first-name">Content<span class="required">*</span></label>
                <div>
                    <textarea class="form-control ckeditor" name="content" id="content"></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'content');
                      </script>﻿
                </div>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label>HighLight</label>
                <label class="radio-inline" style="padding-left: 40px;">
                    <input type="radio" name="highlight" checked="" value="0">Not Hot
                </label>
                <label class="radio-inline">
                    <input type="radio" name="highlight" checked="" value="1">Hot
                </label>
            </div>
            <button type="submit" class="btn btn-primary"> Add</button>
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