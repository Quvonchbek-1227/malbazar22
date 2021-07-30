@include('inc.links')
	
	<!-- SPECIFIC CSS -->
    <link href="css/account.css" rel="stylesheet">


</head>

<body>
	
	<div id="page">
	
	@include('inc.header')
	<!-- /header -->
	
	<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
			
		</div>
		
		<h1>Дизимнен өтиу</h1>
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client"></h3>
					<div class="form_container">
					<form action="{{url('create')}}" method="POST">
						@csrf
							@if(isset($key))
					<input type="hidden" name="key" value="{{$key}}">
					@endif	
					
									<div class="form-group">
										<label for="">Телефон</label>
										<input type="phone" value="99" class="form-control" id="telephone" name="telephone" placeholder="Telephone*">
										<div class="tel_error">
										@if(isset($errorphone))
							<?php
							echo $errorphone;
							?>							
							@endif		
										</div>
									</div>
						<div class="form-group">
							<label for="">Паролиңиз</label>
							<input type="password" class="form-control" name="password" id="password_in_2" value="">
							<div class="parol_error"></div>
						</div>
						
						<hr>
						<div class="private box">
							<div class="row no-gutters">
								<div class="col-12">
									<div class="form-group">
										<label for="">Атиңиз</label>
										<input type="text" class="form-control" id="name" name="name">
										<div class="name_error"></div>
									</div>
									
								</div>
								
							</div>
							<!-- /row -->
							
							<!-- /row -->
							
						</div>
						
						<hr>
						<!-- <div class="form-group">
							<label class="container_check">Accept <a href="#0">Terms and conditions</a>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
						</div> -->
						
						<input class="btn_1 text-center" value="Дизимнен өтиу" type="button">
					
						</form>
						<h4>Сиз дизимнен ѳтген болсаӊиз <a href="{{route('signin')}}">усы силтеме </a> арӄалы кириўиңиз мумкин</h4>
						<br>
						</div>
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
				
				<!-- /row -->
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
	<script src="{{asset('js/check.js')}}"></script>
	<script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{asset('js/myjs.js') }}"></script>
    <script>
    	// Client type Panel
		$('input[name="client_type"]').on("click", function() {
		    var inputValue = $(this).attr("value");
		    var targetBox = $("." + inputValue);
		    $(".box").not(targetBox).hide();
		    $(targetBox).show();
		});
	</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
		<script>
			$(document).ready(function(){

				$('#telephone').inputmask('(+998) 99-999-99-99');
				
			});
		</script>
</body>
</html>