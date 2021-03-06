@extends('admin.layout.index')
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Category
            <small>Add</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="admin/category/add" method="POST">
        	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
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
                <label>Category Name</label>
                <input class="form-control" name="name" placeholder="Please Enter Username" />
            </div>
            <button type="submit" class="btn btn-primary"> Add</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        <form>
    </div>
</div>
<!-- /.row -->
</div>
@endsection