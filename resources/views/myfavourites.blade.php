@include('inc.links')
	
	<!-- SPECIFIC CSS -->
    <link href="{{asset('css/home_1.cs')}}s" rel="stylesheet">

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
	                            <!-- <span class="ribbon off">-30%</span> -->
	                            <a href="{{route('animaldetail', ['id' => $animal->animal_id])}}">
	                                <img class="img-fluid lazy" src="{{strtok($animal->images, ',')}}" width="400" height="200" alt="">
	                            </a>
	                            
	                        </figure>
	                    </div>
	                    <div class="col-sm-8">
	                        <a href="product-detail-1.html">
	                            <h3>{{$animal->title}}</h3>
	                        </a>

	                        <div class="price_box">
	                            <span class="new_price">{{$animal->price}}</span>
	                        </div>
	                        <a href="{{route('deletefavourite', ['fav_id'=>$animal->fav_id])}}" class="btn_1 mt-3 mb-3">Оширыу</a>
	                        
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
    <script src="{{asset('js/common_scripts.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="{{asset('js/sticky_sidebar.min.js')}}"></script>
	<script src="{{asset('js/specific_listing.js')}}"></script>
	<script src="{{ asset('js/myjs.js') }}"></script>
		
</body>
</html>