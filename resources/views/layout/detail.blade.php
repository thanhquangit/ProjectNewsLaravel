@extends('layout.layout.index')
@section('content')
<div class="container">
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{$news->title}}</h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#">Admin</a>
            </p>

            <!-- Preview Image -->
            <img class="img-responsive" src="upload/tintuc/{{$news->image}}" alt="">

            <!-- Date/Time

                    <?php
                        //echo date_format($news->created_at,"d/m/Y H:i:s");
                    ?>
             -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on: {{$news->created_at}}
			</p>
            <hr>

            <!-- Post Content -->
            <p class="lead">{!!$news->content!!}</p>

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            @if(Auth::check())
            <div class="well">
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                <form role="form" action="comment/{{$news->id}}" method="post">
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
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>

            <hr>    
            @endif

            <!-- Posted Comments -->

            <!-- Comment -->
            @foreach($news->comment as $cm)
	            <div class="media">
	                <a class="pull-left" href="#">
	                    <img class="media-object" src="http://placehold.it/64x64" alt="">
	                </a>
	                <div class="media-body">
	                    <h4 class="media-heading">{{$cm->users->name}}
	                        <small><?php echo date_format($cm->created_at,'d/m/Y H:i:s') ?></small>
	                    </h4>
	                    {{$cm->content}}
	                </div>
	            </div>
			@endforeach
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin liên quan</b></div>
                <div class="panel-body">
					@foreach($news_release as $nr)
                    <!-- item -->
	                    <div class="row" style="margin-top: 10px;">
	                        <div class="col-md-5">
	                            <a href="detail/{{$nr->id}}">
	                                <img class="img-responsive" src="upload/tintuc/{{$nr->image}}" alt="">
	                            </a>
	                        </div>
	                        <div class="col-md-7">
	                            <a href="detail/{{$nr->id}}"><b>{{$nr->title}}</b></a>
	                        </div>
	                        <p>{!!$nr->summary!!}</p>
	                        <div class="break"></div>
	                    </div>
                    @endforeach
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin nổi bật</b></div>
                <div class="panel-body">

                  	@foreach($news_hot as $rl)
	                    <div class="row" style="margin-top: 10px;">
	                        <div class="col-md-5">
	                            <a href="detail/{{$rl->id}}">
	                                <img class="img-responsive" src="upload/tintuc/{{$rl->image}}" height="" width="" alt="">
	                            </a>
	                        </div>
	                        <div class="col-md-7">
	                            <a href="detail/{{$rl->id}}"><b>{{$rl->title}}</b></a>
	                        </div>
	                        <p>{!!$rl->summary!!}</p>
	                        <div class="break"></div>
	                    </div>
					@endforeach
                </div>
            </div>
            
        </div>

    </div>
    <!-- /.row -->
</div>


@endsection
