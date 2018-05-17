@extends('admin.layout.index')
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Users
            <small>Edit</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="admin/users/edit/{{$users->id}}" method="POST">
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
                <label>Name</label>
                <input class="form-control" name="name" value="{{$users->name}}" disabled="true" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="email" value="{{$users->email}}" disabled="true" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" name="password" value="{{$users->password}}" disabled="true" type="password" />
            </div>
            <div class="form-group">
                <label>Level</label>
                @if($users->level == 0)
                    <label class="radio-inline">
                        <input type="radio" name="level" checked="" value="0">User
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="level" value="1">Admin
                    </label>
                @else
                    <label class="radio-inline">
                        <input type="radio" name="level" value="0">User
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="level" checked="" value="1">Admin
                    </label>
                @endif
            </div>
            <button type="submit" class="btn btn-primary"> Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        <form>
    </div>
</div>
<!-- /.row -->
</div>
@endsection