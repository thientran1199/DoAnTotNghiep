<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng nhập trang quản lý</title>
     <link rel="icon" type="image/png" href="{{asset('images/logoWEB/favicon.png')}}">
    <!-- Custom fonts for this template-->
   	<link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-light">
    @if(session('msg'))
        <div class="alert alert-{{session('typeMsg')}} alert-dismissible text-center mt-5" style="position: absolute;right: 0;z-index: 5">{{ session('msg') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block embed-responsive embed-responsive-1by1 "><img class="embed-responsive-item" src="{{asset('images/logoWEB/logo.png')}}">></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Đăng nhập trang quản lý</h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="stringUsername" placeholder="Nhập username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="stringPassword" placeholder="Nhập password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="remember" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Duy trì đăng nhập</label>
                                            </div>
                                        </div>
                                        <input type="submit" name="" class="btn btn-primary btn-user btn-block" value="Đăng nhập">                           
                                    </form>
                                    @if($errors->has('stringUsername'))
                                <div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringUsername') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('backend/js/sb-admin-2.min.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            window.setTimeout(function() {
                $(".alert").fadeOut(2000);
                $(".alert").setTimeout(function(){
                    $(this).remove();
                });
            }, 3000);
        });
    </script>

</body>

</html>