<footer class="revealed">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-4 col-md-6">
					<h3 data-target="#collapse_2">Бѳлимлер</h3>
					
					<div class="collapse dont-collapse-sm links" id="collapse_2">
						
						<ul>
						@foreach($categories as $category)
											<li><span><a href="{{route('searchads', ['categories' => $category->id, 'cities' => 'all', ])}}">{{$category->name}}</a></span></li>
						@endforeach
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
						<h3 data-target="#collapse_3">Байланыс</h3>
					<div class="collapse dont-collapse-sm contacts" id="collapse_3">
						<ul>
							<li><i class="ti-home"></i>Нукус</li>
							<li><i class="ti-headphone-alt"></i>+33 447-00-69</li>
							<li><i class="ti-email"></i><a href="http://t.me/nwebdev">info.malbazar.uz</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
						<h3 data-target="#collapse_4">Keep in touch</h3>
					<div class="collapse dont-collapse-sm" id="collapse_4">
						<div id="newsletter">
						    <div class="form-group">
						        <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
						        <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
						    </div>
						</div>
						<div class="follow_us">
							<h5>Ag`za Boliw</h5>
							<ul>
								<li><a href="#"><i class="fab fa-instagram fa-2x" style="color:#fff"></i></a></li>
								<li><a href="#"><i class="fab fa-facebook fa-2x" style="color:#4e94ce"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube fa-2x" style="color:red"></i></a></li>
								<li><a href="#"><i class="fab fa-tiktok fa-2x" style="color:black"></i></a></li>
								<li><a href="https://t.me/malbazar_chat"><i class="fab fa-telegram fa-2x" style="color:#cccccc"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /row-->
			<hr>
			<div class="row add_bottom_25">
			
				<div class="col-lg-12">
					<ul class="additional_links">
						<li><a href="https://texnopos.uz">TexnoPOS</a></li>
						<li><span>© 2021</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>