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
			
		<h1>Кириӯ</h1>
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="client"></h3> 
					<div class="form_container">
						
					<form action="{{url('checklogin')}}" method="POST">
						@csrf
						<div class="form-group">
										<label for="">Телефон</label>
										<input type="phone" value="99" class="form-control" id="telephone" name="telephone" placeholder="Telephone*">
										<div class="tel_error">
						</div>
						<br>
						<div class="form-group">
							<input type="password" class="form-control" name="password" id="password_in_2" value="" placeholder="Parol">
							<div class="parol_error"></div>
						</div>
						
						<hr>
						@if(isset($error))
						<span class="error" id="baza" style="color:red;">Телефон номер ямаса парол кате</span>
						@endif
						<div class="text-center"><input class="btn_1 text-center"  class="btn_1 full-width" value="Кириў" type="button">
						</div>
						</form>
						<h4>Сиз дизимнен ѳтпеген болсаӊиз <a href="{{route('signup')}}">усы силтеме </a> арӄалы дизимнен ѳтиуиӊиз мумкин</h4>
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
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
	<script src="{{asset('js/checksignin.js') }}"></script>

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