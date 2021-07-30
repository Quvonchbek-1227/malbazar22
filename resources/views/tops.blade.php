<div id="carousel-home">
			@if(count($tops) == 0)
			

			@elseif(count($tops)> 5)
			<div class="owl-carousel owl-theme">
				
				@for($i = 0; $i < 3; $i++)
				<div class="owl-slide cover" style="background-image: url({{strtok($tops[$i]->images, ',')}});">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-end">
								<div class="col-lg-6 static">
									<div class="slide-text text-right white">
										<h2 class="owl-slide-animated owl-slide-title">{{$tops[$i]->title}}</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											
										</p>
										<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{route('animaldetail', ['id' => $tops[$i]->id])}}" role="button">Кориу</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endfor
				
			</div>
			<div id="icon_drag_mobile"></div>
		</div>
		<!--/carousel-->

		<ul id="banners_grid" class="clearfix">
			@for($j = 3; $j < 6; $j++)
			<li>
				<a href="{{route('animaldetail', ['id' => $tops[$j]->id])}}" class="img_container">
					
					<img src="{{strtok($tops[$j]->images, ',')}}" data-src="{{strtok($tops[$j]->images, ',')}}" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>{{$tops[$j]->title}}</h3>
						<div><span class="btn_1">Кориу</span></div>
					</div>

				</a>
			</li>
			@endfor
		</ul>
		
		
		@elseif(count($tops)< 5)
		
		<!--/carousel-->

		<ul id="banners_grid" class="clearfix">
			@for($j = 0; $j < 3; $j++)
			<li>
				<a href="{{route('animaldetail', ['id' => $tops[$j]->id])}}" class="img_container">
					
					<img src="{{strtok($tops[$j]->images, ',')}}" data-src="{{strtok($tops[$j]->images, ',')}}" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>{{$tops[$j]->title}}</h3>
						<div><span class="btn_1">Shop Now</span></div>
					</div>

				</a>
			</li>
			@endfor
		</ul>
	
		<p></p>
		@endif