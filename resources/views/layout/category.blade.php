@extends('layout.layout.index')
@section('content')
<div class="container">
    <div class="row">
        @include('layout.layout.menu')
        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h4><b>{{$type->type_nname}}</b></h4>
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
	                        <h3>{{$n->title}}</h3>
	                        <p>{!!$n->summary!!}</p>
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