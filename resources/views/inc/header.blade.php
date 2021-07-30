<header class="version_1">
		<div class="layer"></div><!-- Mobile menu overlay mask -->
		<div class="main_header">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
						<div id="logo">
							<a href="{{route('index')}}"><img src="{{asset('logo/malbazar.png')}}" alt="" style="margin-top:10px;margin-bottom:10px" width="100" height="60"></a>
						</div>
					</div>
					<nav class="col-xl-6 col-lg-7">
							{{-- <a class="open_close" href="javascript:void(0);">
								<div class="hamburger  hamburger--spin btn_cat_mob">
									<div class="hamburger-box">
										<div class="hamburger-inner"></div>
									</div>
								</div>
							</a> --}}
						
					</nav>
					<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
						<a class="phone_top" href="tel://9438843343"><strong><span>Сораулар ушын?</span>+33 447-00-69</strong></a>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- /main_header -->

		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 col-md-3">
						<nav class="categories">
							<ul class="clearfix">
								<li><span>
										<a href="#">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Бѳлимлер    
										</a>
									</span>
									<div id="menu">
										<ul>
											@foreach($categories as $category)
											<li><span><a href="{{route('searchads', ['categories' => $category->id, 'cities' => 'all', ])}}">{{$category->name}}</a></span></li>
											@endforeach
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
						<form action="{{url('/search')}}" method="get">
						<div class="custom-search-input">
						<!-- aa;us;idhsiudh;iudhd;iuh;d -->
							<input type="text" name="search" placeholder="Излеу..." required>
							<button type="submit"><i class="header-icon_search_custom"></i></button>
						</div>
						</form>
					</div>
					<div class="col-xl-3 col-lg-2 col-md-3">
						<ul class="top_tools">
							<li>
							@if(session()->get('user_id'))
								<div class="dropdown dropdown-cart">

					<a href="{{url('/myfavourites')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                    </svg>
                  	</a>
									<!-- <div class="dropdown-menu">

										<ul>
											<li>
												<a href="product-detail-1.html">
													<figure><img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>1x Armor Air x Fear</span>$90.00</strong>
												</a>
												<a href="#0" class="action"><i class="ti-trash"></i></a>
											</li>
											<li>
												<a href="product-detail-1.html">
													<figure><img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>1x Armor Okwahn II</span>$110.00</strong>
												</a>
												<a href="0" class="action"><i class="ti-trash"></i></a>
											</li>
										</ul>
										<div class="total_drop">
											<div class="clearfix"><strong>Total</strong><span>$200.00</span></div>
											<a href="cart.html" class="btn_1 outline">View Cart</a><a href="checkout.html" class="btn_1">Checkout</a>
										</div>
									</div>  -->
								</div>
							@endif
								<!-- /dropdown-cart-->
							</li>
							<li>
					<a href="{{url('/addanimal')}}">
                  	<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>						
							</li>
							<li >
								<div class="dropdown dropdown-access">
									<a class="access_link">
										<span>Account</span>
									</a>
									<div class="dropdown-menu">
										@if(session()->get('user_id'))
										<a href="{{route('logout')}}" class="btn_1">Шыгыу</a>
										@else
										<a href="{{route('signin')}}" class="btn_1">Кириӯ</a>
										<a href="{{route('signup')}}" class="btn_1">Дизимнен өтиу</a>
										@endif
										<ul>
											@if(session()->get('user_id'))
											<li>
												<a href="{{route('myads')}}"><i class="ti-package"></i>Менин рекламаларым</a>
											</li>
											<!-- <li>
												<a href="account.html"><i class="ti-user"></i>Менин Профилим</a>
											</li>
											-->
											<li>
												<a href="{{route('contacts')}}"><i class="ti-help-alt"></i>Жардем хам сораулар</a>
											</li>
												
											</li>
											@endif
										</ul>
									</div>
								</div>
								<!-- /dropdown-access-->
							</li>
							<li>
								<a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
							</li>
							<li>
								<a href="#menu"  class="btn_cat_mob">
									<div class="hamburger hamburger--spin" >
										<div class="hamburger-box">
											<div class="hamburger-inner"></div>
										</div>
									</div>
									Бѳлимлер	
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			
			<div class="search_mob_wp mb-3">
						<form action="{{url('/search')}}" method="get">
						<div class="custom-search-input">
						<!-- aa;us;idhsiudh;iudhd;iuh;d -->
							<input type="text" name="search" placeholder="Излеу..." required>
							<button type="submit"><i class="header-icon_search_custom"></i></button>
						</div>
						</form>
			</div>
			<!-- /search_mobile
		</div>

	</header>
	