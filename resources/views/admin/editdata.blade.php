<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('../assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('../assets/images/favicon.png')}}" type="image/x-icon">
    <title>Cuba - Premium Admin Template</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/scrollbar.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('../assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/responsive.css')}}">
  </head>
  @include('inc.aheader')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Validation Forms</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"> Form Controls</li>
                    <li class="breadcrumb-item active"> Validation Forms</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>{{$table_name}}</h5><span></span>
                  </div>
                  <div class="card-body">
                  @if($table_name == 'animals')
                    <form action="{{route('checkeditdata', ['table_name' => $table_name])}}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate="">
                    @csrf
                      <div class="row g-3">
                      <input type="hidden" value="{{$data[0]->id}}" name="id">
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom01">ати</label>
                          <input class="form-control" name="title" id="validationCustom01" type="text" value="{{$data[0]->title}}" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom02">Бахасы</label>
                          <input class="form-control" name="price" id="validationCustom02" type="text" value="{{$data[0]->price}}" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom02">Телефон</label>
                          <input class="form-control" name="telephone" id="validationCustom02" type="text" value="{{$data[0]->telephone}}" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        
                      </div>
                      <div class="row g-3">
                        <div class="col-md-12">
                          <label class="form-label" for="validationCustom03">Толык маглыумат</label>
                          <textarea class="form-control" name="description" id="" cols="30" rows="10">{{$data[0]->description}} </textarea>
                          <div class="invalid-feedback">Please provide a valid city.</div>
                        </div>
                        <div class="col-6">
                          <label class="form-label" for="validationCustom04">категория</label>
                          <select class="form-select" name="category" id="validationCustom04" required="">
                            <option selected="" value="{{$data[0]->category_id}}">{{$data[0]->category_name}}</option>
                            @foreach($categories as $category)
                            @if($data[0]->category_id != $category->id)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                            @endforeach
                          </select>
                          <div class="invalid-feedback">Please select a valid state.</div>
                        </div>
                        <div class="col-6">
                          <label class="form-label" for="validationCustom04">регион</label>
                          <select class="form-select" name="city" id="validationCustom04" required="">
                          <option selected="" value="{{$data[0]->city_id}}">{{$data[0]->city_name}}</option>
                            @foreach($cities as $city)
                            @if($data[0]->city_id != $city->id)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endif
                            @endforeach
                          </select>
                          <div class="invalid-feedback">Please select a valid state.</div>
                        </div>
                        <div class="col-md-12">
                        <div>
                        <div class="fileupload">
                    
                        <input class="form-control" value="dawda" id="image" type="file" name="images[]" multiple="true" accept="image/*" required>
                        <div class="invalid-feedback">Example invalid form file feedback</div>
                          </div>
                          </div>
                        </div>
                            
                      </div>
                      <div class="mb-3">
                        <div class="form-check">
                          <div class="checkbox p-0">
                            <input class="form-check-input" id="invalidCheck" type="checkbox" required="">
                            <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
                          </div>
                          <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                  @endif

                  @if($table_name == 'categories')
                    <form action="{{route('checkeditdata', ['table_name' => $table_name])}}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                     
                    <input type="hidden" value="{{$data[0]->id}}" name="id">
                        <div class="col-md-12">
                       
                          <label class="form-label" for="validationCustom01">ати</label>
                          <input class="form-control" name="name" id="validationCustom01" type="text" value="{{$data[0]->name}}" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div>
                        <div class="fileupload">
                        
                        <div class="invalid-feedback">Example invalid form file feedback</div>
                          </div>
                          </div>
                        </div>
                            
                      </div>
                     
                      <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                  @endif

                  @if($table_name == 'cities')
                    <form action="{{route('checkeditdata', ['table_name' => $table_name])}}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                     
                   
                        <div class="col-md-12">
                        <input type="hidden" value="{{$data[0]->id}}" name="id">
                          <label class="form-label" for="validationCustom01">ати</label>
                          <input class="form-control" name="name" id="validationCustom01" type="text" value="{{$data[0]->name}}" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div>
                        <div class="fileupload">
                        
                        <div class="invalid-feedback">Example invalid form file feedback</div>
                          </div>
                          </div>
                        </div>
                            
                      </div>
                     
                      <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                  @endif

                  @if($table_name == 'comments')
                    <form action="{{route('checkeditdata', ['table_name' => $table_name])}}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                      <div class="row g-3">
                        <input type="hidden" value="{{$data[0]->id}}" name="id">
                        <div class="col-md-4">
                        <label class="form-label" for="validationCustom03">Текст</label>
                          <textarea class="form-control" name="text" id="" cols="30" rows="10">{{$data[0]->text}}</textarea>
                          <div class="invalid-feedback">Please provide a valid city.</div>
                        </div>
                       
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom02">User ID</label>
                          <input class="form-control" name="user_id" id="validationCustom02" type="number" value="{{$data[0]->user_id}}" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom02">Animal ID</label>
                          <input class="form-control" name="animal_id" id="validationCustom02" type="number" value="{{$data[0]->animal_id}}" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        
                      </div>
                     
                      <br>
                      <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                  @endif

                  @if($table_name == 'news')
                    <form action="{{route('checkeditdata', ['table_name' => $table_name])}}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                      <div class="row g-3">
                      <input type="hidden" value="{{$data[0]->id}}" name="id">
                        <div class="col-md-12">
                          <label class="form-label" for="validationCustom01">ати</label>
                          <input class="form-control" name="title" id="validationCustom01" type="text" value="" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        
                        
                      </div>
                      <div class="row g-3">
                        <div class="col-md-12">
                          <label class="form-label" for="validationCustom03">Толык маглыумат</label>
                          <textarea class="form-control" name="full_text" id="" cols="30" rows="10"></textarea>
                          <div class="invalid-feedback">Please provide a valid city.</div>
                        </div>
                       
                        <div class="col-md-12">
                        <div>
                        <div class="fileupload">
                        <input class="form-control"  id="images" type="file" name="images" multiple="true" accept="image/*" required>
                        <div class="invalid-feedback">Example invalid form file feedback</div>
                          </div>
                          </div>
                        </div>
                            
                      </div>
                      <br>
                      <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                  @endif

                  @if($table_name == 'users')
                    <form action="{{route('checkeditdata', ['table_name' => $table_name])}}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                      <div class="row g-3">
                      <input type="hidden" value="{{$data[0]->id}}" name="id">
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom01">email</label>
                          <input class="form-control" name="email" id="validationCustom01" type="email" value="{{$data[0]->email}}" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom02">name</label>
                          <input class="form-control" name="name" id="validationCustom02" type="text" value="{{$data[0]->name}}" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="validationCustom02">Телефон</label>
                          <input class="form-control" name="telephone" id="validationCustom02" type="text" value="{{$data[0]->telephone}}" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        
                      </div>
                      <div class="row g-3">
                       
                        <div class="col-6">
                        
                        @if($data[0]->status == '')
                          <label class="form-label" for="validationCustom04">user</label>
                          @elseif($data[0]->status == '1')
                          <label class="form-label" for="validationCustom04">admin</label> 
                          @else
                          <label class="form-label" for="validationCustom04">status jok</label>
                          @endif
                         
                          <select class="form-select" name="status" id="validationCustom04" required="">
                            
                            <option  value="0">user</option>
                            <option  value="1">admin</option>
                           
                          </select>
                          <div class="invalid-feedback">Please select a valid state.</div>
                        </div>
                        <div class="col-6">
                        <label class="form-label" for="validationCustom02">Парол</label>
                          <input class="form-control" name="password" id="validationCustom02" type="password" value="" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-md-12">
                        <div>
                        
                          </div>
                        </div>
                            
                      </div>
                      <div class="mb-3">
                        <div class="form-check">
                         
                          <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                  @endif
                  </div>
                </div>
               
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright 2021 © Cuba theme by pixelstrap  </p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="{{asset('../assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('../assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('../assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('../assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <script src="{{asset('../assets/js/scrollbar/simplebar.js')}}"></script>
    <script src="{{asset('../assets/js/scrollbar/custom.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('../assets/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('../assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('../assets/js/form-validation-custom.js')}}"></script>
    <script src="{{asset('../assets/js/tooltip-init.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('../assets/js/script.js')}}"></script>
    <script src="{{asset('../assets/js/theme-customizer/customizer.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>