@include('inc.links')
	<!-- SPECIFIC CSS -->
    <link href="css/leave_review.css" rel="stylesheet">
</head>
<body>
	
	<div id="page">
		
	@include('inc.header')
	<!-- /header -->
	<main>
	<div class="container margin_60_35">
	
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="write_review">
						<h1>Дағаза бериў</h1>
						<div class="rating_submit">
							<div class="form-group">
							
							</div>
						</div>
						<!-- /rating_submit -->
						<form enctype="multipart/form-data" method="POST" action="{{url('/createanimal')}}">
						@csrf
						<div class="form-group">
							<label>Бѳлимлер</label>
							<select name="category" class="form-control" id="">
								@foreach($categories as $category)	
								<option value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Атин жазыӊ</label>
							<input class="form-control" type="text" id="title" name="title" placeholder="Атин жазыӊ">
							<div class="title_error"></div>
						</div>
						<div class="form-group">
							<label>Толыграк маглыумат</label>
							<textarea class="form-control" id="description" name="description" style="height: 180px;" placeholder="Толыграк маглыумат"></textarea>
							<div class="description_error"></div>
						</div>
						<div class="form-group">
							<label>Суўретлер (3 сүўреттен артиқ болмасин!)</label>
							<div class="fileupload"><input id="image" type="file" name="images[]" multiple="true" accept="image/*" required></div>
							<div class="image_error"></div>
						</div>
						<div class="image_error2"></div>
						<div class="form-group">
							<label>Бахасы</label>
							<input class="form-control" type="text" id="price" name="price" placeholder="Бахасы">
						</div>
						<div class="price_error"></div>
						<div class="form-group">
							<label>Телефон</label>
							<input class="form-control" type="text" id="telephone" name="telephone" placeholder="Телефон">
						</div>
						<div class="telephone_error"></div>
						<div class="form-group">
							<label>Аймақти сайлаң</label>
							<select name="city" class="form-control">
								@foreach($cities as $city)	
								<option value="{{$city->id}}">{{$city->name}}</option>
								@endforeach
							</select>
						</div>
						<!-- <div class="form-group">
							<div class="checkboxes float-left add_bottom_15 add_top_15">
								<label class="container_check">Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
							</div>
						</div> -->
						
						<input class="btn_1 text-center" value="Дағазаны жəриялаў" type="button">
						</form>
					</div>
				</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
	
	@include('inc.footer')
	<!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="{{asset('js/common_scripts.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
	<script src="{{asset('js/myjs.js') }}"></script>
	<script src="{{asset('js/checkaddanimal.js')}}"></script>


		
</body>
</html>