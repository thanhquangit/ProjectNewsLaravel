<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
        	Menu
        </li>
        @foreach($category as $ct)
            <li href="#" class="list-group-item menu1">
            	{{$ct->category_name}}
            </li>
            <ul>
                @foreach($ct->type as $t)
            		<li class="list-group-item">
            			<a href="category/{{$t->id}}">{{$t->type_nname}}</a>
            		</li>
                @endforeach
            </ul>
        @endforeach
    </ul>
</div>