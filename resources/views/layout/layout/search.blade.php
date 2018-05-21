@extends('layout.layout.index')
@section('content')
<div class="container">
    <div class="row">
        @include('layout.layout.menu')
        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                	<?php 
			            function changeColor($str, $key){
			                return str_replace($key, "<span style='color:red;'>$key</span>", $str);
			            }
			        ?>
                    <h4><b>Tìm kiếm:{{$key}}</b></h4>
                </div>
				@foreach($news as $n)
	                <div class="row-item row">
	                    <div class="col-md-3">

	                        <a href="detail.html">
	                            <br>
	                            <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{$n->image}}" alt="">
	                        </a>
	                    </div>

	                    <div class="col-md-9">
	                        <h3>{!! changeColor($n->title,$key) !!}</h3>
	                        <p>{!!changeColor($n->summary,$key)!!}</p>
	                        <a class="btn btn-primary" href="detail.html">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
	                    </div>
	                    <div class="break"></div>
	                </div>
	            @endforeach
            </div>
        </div> 

    </div>

</div>


@endsection