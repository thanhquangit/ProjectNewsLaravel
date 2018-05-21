@extends('layout.layout.layout_user')
@section('content')
<div class="row carousel-holder">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
		  	<div class="panel-heading">Thông tin tài khoản</div>
		  	<div class="panel-body">
		    	<form action="account" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
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
		    		<div>
		    			<label>Họ tên</label>
					  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" value="{{Auth::user()->name}}">
					</div>
					<br>
					<div>
		    			<label>Email</label>
					  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
					  	disabled value="{{Auth::user()->email}}" 
					  	>
					</div>
					<br>	
					<div>
						<input type="checkbox" class="" name="checkpassword" id="checkpassword">
		    			<label>Đổi mật khẩu</label>
					  	<input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled>
					</div>
					<br>
					<div>
		    			<label>Nhập lại mật khẩu</label>
					  	<input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled>
					</div>
					<br>
					<button type="submit" class="btn btn-default">Sửa
					</button>

		    	</form>
		  	</div>
		</div>
    </div>
    <div class="col-md-2">
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#checkpassword").change(function() {

              if($(this).is(":checked"))
              {
                $(".password").removeAttr('disabled');
              }
              else
              {
                $(".password").attr('disabled','');
              }
            });
        });
    </script>
@endsection