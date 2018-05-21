<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Laravel Tin Tức</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <form class="navbar-form navbar-left" role="search" action="search" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search" name="key">
		        </div>
		        <button type="submit" class="btn btn-default">Tìm kiếm</button>
		    </form>

		    <ul class="nav navbar-nav pull-right">
                @if(!Auth::check())
                <li>
                    <a href="register">Đăng ký</a>
                </li>
                <li>
                    <a href="login">Đăng nhập</a>
                </li>
                @else
                    <li>
                    	<a href="account">
                    		<span class ="glyphicon glyphicon-user"></span>
                    		{{Auth::user()->name}}
                    	</a>
                    </li>

                    <li>
                    	<a href="logout">Đăng xuất</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- /.container -->
</nav>