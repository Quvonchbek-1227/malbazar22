<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" href="{{asset('logo/MBAZAR.png')}}" type="image/x-icon">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Malbazar</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link href="assets2/plugins/animate/animate.css" rel="stylesheet" type="text/css">
        <link href="assets2/css/bootstrap-material-design.min.css" rel="stylesheet" type="text/css">
        <link href="assets2/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets2/css/style.css" rel="stylesheet" type="text/css">

    </head>
    <body>


    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="display-table">
            <div class="display-table-cell">
                <diV class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets2/images/extra.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center pt-3">
                                       
                                    </div>
                                    <div class="px-3 pb-3">
                                        <form class="form-horizontal m-t-20 mb-0" method="POST" action="{{route('test')}}">
                                        @csrf  
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" name="login" type="text" required="" placeholder="Username">
                                                </div>
                                            </div>
                    
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                                </div>
                                            </div>
                    
                                           
                    
                                            <div class="form-group text-right row m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-raised btn-block waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                                            </div>
                    
                                        </form>
                                    </div>
                    
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </diV>
            </div>
        </div>
    </div>



        <!-- jQuery  -->
        <script src="assets2/js/jquery.min.js"></script>
        <script src="assets2/js/popper.min.js"></script>
        <script src="assets2/js/bootstrap-material-design.js"></script>
        <script src="assets2/js/modernizr.min.js"></script>
        <script src="assets2/js/detect.js"></script>
        <script src="assets2/js/fastclick.js"></script>
        <script src="assets2/js/jquery.slimscroll.js"></script>
        <script src="assets2/js/jquery.blockUI.js"></script>
        <script src="assets2/js/waves.js"></script>
        <script src="assets2/js/jquery.nicescroll.js"></script>
        <script src="assets2/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets2/js/app.js"></script>
        
    </body>
</html>