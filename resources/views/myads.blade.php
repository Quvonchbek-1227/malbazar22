@include('inc.links')

	<!-- SPECIFIC CSS -->
    <link href="css/listing.css" rel="stylesheet">
	<link href="{{asset('css/home_1.css')}}" rel="stylesheet">
</head>

<body>
	
	<div id="page" class="theia-exception">
		
	@include('inc.header')
	<!-- /header -->
		
	<main>
	@include('tops')
	    <!-- /top_banner -->
	    <div id="stick_here"></div>
	   
	    <!-- /toolbox -->
	    <div class="container margin_30">
	        <div class="row">
	           
	            <!-- /col -->
	            <div class="col-lg-12">
				
				@foreach($animals as $animal)
	            
				    <div class="row row_item">
	                    <div class="col-sm-4">
	                        <figure>
								@if($animal->top == '1')
								<span class="ribbon hot">TOP</span>
								@endif
	                            <a href="{{route('animaldetail', ['id' => $animal->id])}}">
	                                <img class="img-fluid lazy image" style="width:400px;height200px;" src="{{strtok($animal->images, ',')}}" width="400" height="200" alt="">
	                            </a>
	                           
	                        </figure>
	                    </div>
	                    <div class="col-sm-8">
	                        <a href="{{route('animaldetail', ['id' => $animal->id])}}">
	                            <h3>{{$animal->title}}</h3>
	                        </a>
	                        <div class="price_box">
	                            <span class="new_price">{{$animal->price}}</span>
	                        
	                        </div>
	                        <ul>
	                            <!-- <li><a href="#0" class="btn_1">Тезлеу сатыу</a></li> -->
								<li><a href="{{route('deleteads', ['id'=>$animal->id])}}" class="btn_1">Оширыу</a></li>
	                         </ul>
	                    </div>
	        	    </div>
				@endforeach
	                <!-- /row_item -->
	              
	                <!-- /row_item -->
	               
	            </div>
	            <!-- /col -->
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	</main>
	<!-- /main -->
	
	@include('inc.footer')
	<!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/main.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="{{asset('js/sticky_sidebar.min.js')}}"></script>
	<script src="{{asset('js/specific_listing.js')}}"></script>
	<script src="{{ asset('js/myjs.js') }}"></script>
		
</body>
</html>