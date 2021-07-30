@include('inc.links')

	<!-- SPECIFIC CSS -->
    <link href="{{asset('css/home_1.cs')}}s" rel="stylesheet">
</head>

<body>
	<div id="page">
	@include('inc.header')
	<!-- /header -->
		
	<main>
		@include('tops')
		<!--/banners_grid -->
		
		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Соӊғы ӄосылғанлар</h2>
				<span>Products</span>
				<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p> -->
			</div>
			<div class="row small-gutters">

				@foreach($animals as $animal)
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						@if($animal->top == '1')
						<span class="ribbon hot">TOP</span>
						@endif
						<figure>
							<a href="{{route('animaldetail', ['id'=>$animal->id])}}">
								@if($animal->images)
								<img class="img-fluid lazy image"  src="{{strtok($animal->images, ',')}}" data-src="" alt="">
								@else
								<img class="img-fluid lazy image"  src="{{asset('img/malbazar.png')}}" data-src="" >
								@endif
							</a>
						</figure>
						{{-- <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div> --}}
						<a href="{{route('animaldetail', ['id' => $animal->id])}}">
							<h3>{{$animal->title}}</h3>
						</a>
						<div class="price_box">
							<span class="new_price">{{$animal->price}}</span>
							<br><br>
							<p>{{$animal->name}}</p>
						</div>
						<ul>
						@if(isset($error))
						<script>alert(error)</script>
						@endif
							<!-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li> -->
							@if(session()->get('user_id'))
							<li><a href="#"  onclick="httpGet('{{route('addfavourite', ['animal_id' => $animal->id])}}');" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="сайланганларга косыу">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" 
								fill="currentColor" class="bi bi-bookmark" 
								viewBox="0 0 16 16">
  								<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
								</svg>
							<span>Add to cart</span></a></li>
							@endif
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				@endforeach
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container url({{asset('img/cowmarket.jpg')}}) -->

		<div class="featured lazy" data-bg="url('https://cdn.pixabay.com/photo/2020/09/01/06/10/lake-5534341_960_720.jpg')">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<div class="container margin_60">
					<div class="row justify-content-center justify-content-md-start">
						<div class="col-lg-6 wow" data-wow-offset="150">
							<!-- <h3><br></h3>
							<p>Lightweight cushioning and durable support with a Phylon midsole</p>
							<div class="feat_text_block">
								<div class="price_box">
									<span class="new_price">$90.00</span>
									<span class="old_price">$170.00</span>
								</div>
								<a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /featured -->

	
		<!-- /container -->
		
		<!-- <div class="bg_gray">
			<div class="container margin_30">
				<div id="brands" class="owl-carousel owl-theme">
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_1.png" alt="" class="owl-lazy"></a>
					</div>
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_2.png" alt="" class="owl-lazy"></a>
					</div>
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_3.png" alt="" class="owl-lazy"></a>
					</div>
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_4.png" alt="" class="owl-lazy"></a>
					</div>
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_5.png" alt="" class="owl-lazy"></a>
					</div>
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_6.png" alt="" class="owl-lazy"></a>
					</div> 
				</div>
			</div>		
		</div> -->
		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Еӊ көп кѳрилгенлер</h2>
				<span>Products</span>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
			</div>
			<div class="row small-gutters">

				
				@foreach($views as $view)
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						@if($view->top == '1')
						<span class="ribbon hot">TOP</span>
						@endif
						<figure>
							<a href="{{route('animaldetail', ['id'=>$view->id])}}">
								<img class="img-fluid lazy image"  src="{{strtok($view->images, ',')}}" data-src=""  alt="">
							</a>
						</figure>
						{{-- 
							<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div> 
						--}}
						<a href="{{route('animaldetail', ['id' => $view->id])}}">
							<h3>{{$view->title}}</h3>
						</a>
						<div class="price_box">
							<span class="new_price">{{$view->price}}</span>
							<br><br>
							<p>{{$view->name}}</p>
						</div>
						<ul>
							<!-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li> -->
							@if(session()->get('user_id'))
							<li><a href="#" onclick="httpGet('{{route('addfavourite', ['animal_id' => $view->id])}}');" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
  								<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
								</svg>
							<span>Add to cart</span></a></li>
							@endif	
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				@endforeach
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
		

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Соӊғы жаӊалыӄлар</h2>
				<span>Blog</span>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
			</div>
			<div class="row">
				@foreach($news as $new)
				<div class="col-lg-6">
					<a class="box_news" href="{{route('getNews', ['id' => $new->id])}}">
						<figure>
							<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-1.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>Админ</li>
							<li>{{$new->created_at}}</li>
						</ul>
						<h4>{{$new->title}}</h4>
						<p>
						<!-- {{$new->full_text}} -->
						
						<?php 
						
						$x = explode(' ', $new->full_text);
						$count = count($x);
						if($count > 26){
						for ($i=0; $i < 27 ; $i++) { 
							# code...
							echo $x[$i]." ";	
						}echo "...";
						}else{
							for ($i=0; $i < $count; $i++) { 
								# code...
								echo $x[$i]." ";	
							}echo "...";
						}
						
						
						?>
						
						</p>
					</a>
				</div>
				@endforeach
				<!-- /box_news -->
			
				<!-- /box_news -->
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
	<script src="{{asset('js/carousel-home.min.js')}}"></script>
	<script src="{{ asset('js/myjs.js') }}"></script>

	<script>
	function httpGet(theUrl){
	var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );	
	}
	</script>
 
</body>
</html>