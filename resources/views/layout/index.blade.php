@extends('layout.layout.index')
@section('content')
<div class="container">
    	<!-- slider -->
	@include('layout.layout.slide')
    <div class="space20"></div>
    <div class="row main-left">
        @include('layout.layout.menu')
        <div class="col-md-9">
            <div class="panel panel-default">            
            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
            		<h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
            	</div>

            	<div class="panel-body">
            		@foreach($category as $ct)
	            		<!-- item -->
					    <div class="row-item row">
		                	<h3>
		                		<a href="#">{{$ct->category_name}}</a> |
		                		@foreach($ct->type as $t) 	
		                			<small><a href="category/{{$ct->id}}"><i>{{$t->type_nname}}</i></a>/</small>
		                		@endforeach
		                	</h3>
		                	<?php
		                		$data = $ct->news->where('highlight',1)->sortByDesc('created_at')->take(5);
		                		$first = $data->shift();

		                	?>
		                	@if($first != null)
			                	<div class="col-md-8 border-right">
			                		<div class="col-md-5">
				                        <a href="detail/{{$first->id}}">
				                            <img class="img-responsive" src="upload/tintuc/{{$first['image']}}" alt="">
				                        </a>
				                    </div>

				                    <div class="col-md-7">
				                        <h3>{{$first['title']}}</h3>
				                        <p>{{$first['summary']}}</p>
				                        <a class="btn btn-primary" href="detail/{{$first['id']}}">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
									</div>

			                	</div>
		                    @endif

							<div class="col-md-4">
								@foreach($data as $dt)
									<a href="detail/{{$dt->id}}">
										<h4>
											<img src="upload/tintuc/{{$dt['image']}}" width="20" height="20" /> 
											{{$dt->title}}
										</h4>
									</a>
								@endforeach
								
							</div>
							
							<div class="break"></div>
		                </div>
		                <!-- end item -->
		            @endforeach
				</div>
            </div>
    	</div>
    </div>
</div>
@endsection