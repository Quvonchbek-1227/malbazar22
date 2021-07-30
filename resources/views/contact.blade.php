@include('inc.links')

    <link href="css/blog.css" rel="stylesheet">
</head>

<body>
	
	<div id="page">
	
	@include('inc.header')
	<!-- /header -->
	
	<main class="bg_gray">
		<div class="container margin_30">
			
			<!-- /page_header -->
			<div class="row">
				<div class="col-lg-12">
					
					<!-- /single-post -->

					

					
					<h5>Пикир қалдириў ушин</h5>
					<form action="{{route('createcomment')}}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<input type="text" name="name" id="name" class="form-control" placeholder="Атиңиз">
								<div class="name_error"></div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<input type="text" name="email" id="email" class="form-control" placeholder="Электрон почтаңиз">
								<div class="email_error"></div>
							</div>
						</div>
						
					</div>
					<div class="form-group">
						<textarea class="form-control" name="comment" id="comment" rows="6" placeholder="Пикирңиз"></textarea>
						<div class="comment_error"></div>
					</div>
					<div class="form-group">
					<input class="btn_1 text-center"  class="btn_1 full-width" value="Жибериў" type="button">
					</div>
					</form>
					
				</div>
				<!-- /col -->

				
				<!-- /aside -->
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
    <script src="js/common_scripts.min.js"></script>
    <script src="js/main.js"></script>
	<script src="js/checkcontact.js"></script>

		
</body>
</html>