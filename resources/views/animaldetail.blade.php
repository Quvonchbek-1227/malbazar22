@include('inc.links')
<!-- SPECIFIC CSS -->
<link href="{{asset('css/product_page.css')}}" rel="stylesheet">
<link href="{{asset('css/blog.css')}}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/slick.css')}}">
<style>
    .test{
        width: 300px,
    }
</style>
</head>

<body>

    <div id="page">

        @include('inc.header')
        <!-- /header -->

        <main>
            <div class="container margin_30">

                <div class="row">
                    <div class="col-md-6">
                        <div class="all">
                            <div class="slider">
                                <?php
								$img = explode("," , $animal->images);
							?>
                                    <div class="owl-carousel owl-theme main">
                                        @for($i=0; $i
                                        < count($img); $i++ ) <div style="background-image: url({{$img[$i]}});" class="item-box">
                                    </div>
                                    @endfor
                            </div>
                            <div class="left nonl"><i class="ti-angle-left"></i></div>
                            <div class="right"><i class="ti-angle-right"></i></div>
                        </div>
                        <div class="slider-two">
                            <div class="owl-carousel owl-theme thumbs">
                                @if(isset($img[0]))
                                <div style="background-image: url({{$img[0]}});" class="item active"></div>
                                @endif @if(isset($img[1]))
                                <div style="background-image: url({{$img[1]}});" class="item"></div>
                                @endif @if(isset($img[2]))
                                <div style="background-image: url({{$img[2]}});" class="item"></div>
                                @endif @if(isset($img[3]))
                                <div style="background-image: url({{$img[3]}});" class="item"></div>
                                @endif
                            </div>
                            <div class="left-t nonl-t"></div>
                            <div class="right-t"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumbs">

                    </div>
                    <!-- /page_header -->
                    <div class="prod_info">
                        <h1>{{$animal->title}}</h1>
                        <!-- <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span> -->
                        <p>{{$animal->description}}</p>
                        <div class="prod_options">
                            <div class="row">
                                <label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Телефон:</strong></label>
                                <div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
                                    <div class="custom-select-form">
                                        <p><a href="#">{{$animal->telephone}}</a>
                                            <p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Мəнзил:  </strong><a href="#0" data-toggle="modal" data-target="#size-modal"></a></label>
                                <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                    <div class="custom-select-form">
                                        <a href="{{route('searchads', ['categories' => 'all', 'cities' => $animal->city_id, ])}}">
                                            <p>{{$animal->name}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Баҳаси:  </strong><a href="#0" data-toggle="modal" data-target="#size-modal"></a></label>
                                <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                    <div class="custom-select-form">
                                        <p>{{$animal->price}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /prod_info -->
                        <!-- <div class="product_actions">
	                    <ul>
	                        <li>
	                            <a href="#"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
	                        </li>
	                        <li>
	                            <a href="#"><i class="ti-control-shuffle"></i><span>Add to Compare</span></a>
	                        </li>
	                    </ul>
	                </div> -->
                        <!-- /product_actions -->
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->

            <div class="tabs_product">
                <div class="container">
                    <ul class="nav nav-tabs" role="tablist">

                        <li class="nav-item">
                            <a id="tab-B" href="#pane-B" class="nav-link active" data-toggle="tab" role="tab">Пикирлер</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /tabs_product -->
            <div class="tab_content_wrapper">
                <div class="container">
                    <div class="tab-content" role="tablist">

                        <!-- /TAB A -->
                        <div id="pane-B" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-B">
                            <div class="card-header" role="tab" id="heading-B">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
								Пикирлер
	                            </a>
                                </h5>
                            </div>
                            <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div class="col-lg-12">
                                            <div id="comments">

                                                <ul>
                                                    @foreach($comments as $comment)
                                                    <li>
                                                        <div class="avatar">
                                                            <a href="#"><img src="{{asset('img/avatar1.jpg')}}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="comment_right clearfix">
                                                            <div class="comment_info">
                                                                By <a href="#">{{$comment->name}}</a><span>|</span>{{$comment->created_at}}<span>|</span><a href="#"><i class="icon-reply"></i></a>
                                                            </div>
                                                            <p>
                                                                {{$comment->text}}s
                                                            </p>
                                                        </div>

                                                    </li>
                                                    @endforeach

                                                </ul>
                                            </div>

                                            @if(session()->get('user_id'))
                                            <div class="review_content">
                                                <div class="clearfix add_bottom_10">
                                                </div>
                                                <h4>Пикир қалдириў</h4>
                                                <form action="{{route('addcomment', ['id'=>$animal->id])}}" method="POST">
                                                    @csrf
                                                    <p><textarea class="form-control" name="comment" style="height: 180px;" placeholder="Сиздиң пикириңиз"></textarea></p>
                                                    <button class="btn_1">Жибериў</button>
                                                </form>
                                            </div>
                                            @else

                                            <h5><a href="{{route('signup')}}">Өз пикириңизди қалдириў ушин</a><br>
                                            </h5>
                                            @endif
                                        </div>

                                    </div>
                                    <!-- /row -->

                                    <!-- /row -->

                                </div>
                                <!-- /card-body -->
                            </div>
                        </div>
                        <!-- /tab B -->
                    </div>
                    <!-- /tab-content -->
                </div>
                <!-- /container -->
            </div>
            <!-- /tab_content_wrapper -->

            <div class="container margin_60_35">
                <div class="main_title">
                    <h2>Тағи басқалар</h2>
                    <span>Products</span>
                    <!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> -->
                </div>
                <div class="row small-gutters">

                    @foreach($likes as $like)
                    <div class="col-6 col-md-4 col-xl-3">
                        <div class="grid_item">
                            @if($animal->top == '1')
                            <span class="ribbon hot">TOP</span> @endif
                            <figure>
                                <a href="{{route('animaldetail', ['id'=>$like->id])}}">
				<img class="img-fluid lazy image"  src="{{strtok($like->images, ',')}}" data-src="" alt="">
			</a>
                            </figure>
                            <!-- <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
		 -->
                            <a href="{{route('animaldetail', ['id' => $like->id])}}">
                                <h3>{{$like->title}}</h3>
                            </a>
                            <div class="price_box">
                                <span class="new_price">{{$like->price}}</span>
                                <br><br>
                                <p>{{$like->name}}</p>
                            </div>
                            <ul>
                                <!-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
			<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li> -->

                                @if(session()->get('user_id'))
                                <li>
                                    <a href="#" onclick="httpGet('{{route('addfavourite', ['animal_id' => $like->id])}}');" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
  				<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
				</svg>
                                        <span>Add to cart</span></a>
                                </li>
                                @endif

                            </ul>
                        </div>
                        <!-- /grid_item -->
                    </div>
                    @endforeach

                    <!-- /col -->
                </div>
                <!-- /products_carousel -->
            </div>
            <!-- /container -->

            {{-- <div class="feat">
                <div class="container">
                    <ul>
                        <li>

                        </li>
                        <li>

                        </li>
                        <li>

                        </li>
                    </ul>
                </div>
            </div> --}}
            <!--/feat-->

            <div class="container-fluid">
                <div class="row slick1">

                    <div class="col-md-4 col-sm-3  m-1 ">
                            <div class="card">
                                <div class="card-header">
                                    <img class="img-fluid" src="{{asset('assets2/images/small/img-3.jpg')}}" alt="">
                                </div>
                                <div class="card-body">
                                    <h1 class="text-center">Hello World</h1>
                                    <p class="text-center">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam corrupti earum provident dignissimos, accusantium error molestias quis sapiente cum ducimus nostrum, quod sint soluta minima, reprehenderit illum expedita. Cupiditate, quod.
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-outline-danger w-100">OK</button>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-4 col-sm-3  m-1 ">
                        <div class="card">
                            <div class="card-header">
                                <img class="img-fluid" src="{{asset('assets2/images/small/img-3.jpg')}}" alt="">
                            </div>
                            <div class="card-body">
                                <h1 class="text-center">Hello World</h1>
                                <p class="text-center">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam corrupti earum provident dignissimos, accusantium error molestias quis sapiente cum ducimus nostrum, quod sint soluta minima, reprehenderit illum expedita. Cupiditate, quod.
                                </p>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-outline-danger w-100">OK</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-3  m-1 ">
                        <div class="card">
                            <div class="card-header">
                                <img class="img-fluid" src="{{asset('assets2/images/small/img-3.jpg')}}" alt="">
                            </div>
                            <div class="card-body">
                                <h1 class="text-center">Hello World</h1>
                                <p class="text-center">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam corrupti earum provident dignissimos, accusantium error molestias quis sapiente cum ducimus nostrum, quod sint soluta minima, reprehenderit illum expedita. Cupiditate, quod.
                                </p>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-outline-danger w-100">OK</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-3  m-1 ">
                        <div class="card">
                            <div class="card-header">
                                <img class="img-fluid" src="{{asset('assets2/images/small/img-3.jpg')}}" alt="">
                            </div>
                            <div class="card-body">
                                <h1 class="text-center">Hello World</h1>
                                <p class="text-center">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam corrupti earum provident dignissimos, accusantium error molestias quis sapiente cum ducimus nostrum, quod sint soluta minima, reprehenderit illum expedita. Cupiditate, quod.
                                </p>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-outline-danger w-100">OK</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-3  m-1 ">
                        <div class="card">
                            <div class="card-header">
                                <img class="img-fluid" src="{{asset('assets2/images/small/img-3.jpg')}}" alt="">
                            </div>
                            <div class="card-body">
                                <h1 class="text-center">Hello World</h1>
                                <p class="text-center">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam corrupti earum provident dignissimos, accusantium error molestias quis sapiente cum ducimus nostrum, quod sint soluta minima, reprehenderit illum expedita. Cupiditate, quod.
                                </p>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-outline-danger w-100">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <!-- /main -->




        @include('inc.footer')
        <!--/footer-->
    </div>
    <!-- page -->

    <div id="toTop"></div>
    <!-- Back to top button -->


    <!-- /add_cart_panel -->

    <!-- Size modal -->



    <!-- COMMON SCRIPTS -->
    <script src="{{asset('js/common_scripts.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

    <!-- SPECIFIC SCRIPTS -->
    <script src="{{asset('js/carousel_with_thumbs.js')}}"></script>
    <script src="{{ asset('js/myjs.js') }}"></script>
    <script>
        function httpGet(theUrl) {

            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open("GET", theUrl, false); // false for synchronous request
            xmlHttp.send(null);
        }
    </script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script>
        $('.slick1').slick({
            autoplay:true,
            speed:1000,
            autoplaySpeed:3000,
            prevArrow:'',
            nextArrow:'',
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            responsive: [
                {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
                },
                {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
                }
            ]
        });
		
    </script>


</body>

</html>