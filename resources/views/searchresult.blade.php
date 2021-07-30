@include('inc.links')

	<!-- SPECIFIC CSS -->
	<link href="{{asset('css/home_1.css')}}" rel="stylesheet">
    <link href="css/listing.css" rel="stylesheet">
</head>

<body>
	
	<div id="page">
		
@include('inc.header')
	<!-- /header -->
		
	<main>
	@include('tops')
		<!-- /top_banner -->
		
			<div id="stick_here"></div>		
			<div class="toolbox elemento_stick">
				<div class="container">
				<ul class="clearfix">
					<!-- <li>
						<div class="sort_select">
							<select name="sort" id="sort">
                                    <option value="popularity" selected="selected">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to 
							</select>
						</div>
					</li>
					<li>
						<a href="#0"><i class="ti-view-grid"></i></a>
						<a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
					</li> -->
					<li>
						<a data-toggle="collapse" href="#filters" role="button" aria-expanded="false" aria-controls="filters">
							<i class="ti-filter"></i><span>Фильтры</span>
						</a>
					</li>
				</ul>


				<form action="{{route('searchads')}}" method="GET">
				
				<div class="collapse" id="filters"><div class="row small-gutters filters_listing_1">
				<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="form-group">
							<label>Бөлимди сайлан</label>
							<select name="categories" class="form-control" id="">
								<option value="all">Баршеси</option>
								@foreach($categories as $category)	
								<option value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
							</select>
						</div>
					<!-- /dropdown -->
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="form-group">
							<label>Аймақти сайлаң</label>
							<select name="cities" class="form-control" id="">
								<option value="all">Баршеси</option>
								@foreach($cities as $city)	
								<option value="{{$city->id}}">{{$city->name}}</option>
								@endforeach
							</select>
						</div>
					<!-- /dropdown -->
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<!-- <div class="form-group">
							<label>Выберите категории</label>
							<select name="city" class="form-control" id="">
								@foreach($cities as $city)	
								<option value="{{$city->id}}">{{$city->name}}</option>
								@endforeach
							</select>
						</div> -->
					<!-- /dropdown -->
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">

				<!-- <div class="form-group">
							<label>Выберите категории</label>
							<select name="city" class="form-control" id="">
								@foreach($cities as $city)	
								<option value="{{$city->id}}">{{$city->name}}</option>
								@endforeach
							</select>
						</div> -->
					<!-- /dropdown -->
			
				<button class="btn_1">Излеў</button>
				</div>
				</form>
				</div></div>
				</div>
			</div>
			<!-- /toolbox -->

			<div class="container margin_30">
			<div class="row small-gutters">
				
			@if(count($data)>0)
			@foreach($data as $animal)
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						@if($animal->top == '1')
						<span class="ribbon hot">TOP</span>
						@endif
						<figure>
							<a href="{{route('animaldetail', ['id'=>$animal->id])}}">
								<img class="img-fluid image lazy"  src="{{strtok($animal->images, ',')}}" data-src=""  alt="">
							</a>
						</figure>
						<!-- <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div> -->
						<a href="{{route('animaldetail', ['id' => $animal->id])}}">
							<h3>{{$animal->title}}</h3>
						</a>
						<div class="price_box">
							<span class="new_price">{{$animal->price}}</span>
							<br><br >
							<p>{{$animal->name}}</p>
						</div>
						<ul>
							<!-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li> -->
							@if(session()->get('user_id'))
							<li><a href="#" onclick="httpGet('{{route('addfavourite', ['animal_id' => $animal->id])}}');" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart">
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
				   
            	@else
				<h1>Дағаза таўилмади</h1>
				<!-- /col -->
				@endif
				<!-- /col -->				
			</div>
			
			<!-- /row -->
			
			<div class="pagination__wrapper">
			<div class="pagination">
				{{$data->appends(Request::all())->links() }}
            </div>  
			</div>
				
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
	<script src="{{asset('js/myjs.js') }}"></script>
	<script>
	function httpGet(theUrl){
    
	var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );	
	}
	</script>
 
</body>
</html>