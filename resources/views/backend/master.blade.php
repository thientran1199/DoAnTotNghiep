<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trang quản lý</title>
    <link rel="icon" type="image/png" href="{{asset('images/logoWEB/logo1.png')}}">
    <!-- Custom fonts for this template-->
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css"> -->
    <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/admin-page')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink" style="color: orange"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Trang quản lý</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{(request()->is('admin-page')) ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/admin-page')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tổng quan</span></a>
            </li>
            <!-- Nav Item - Pages Collapse danh mục -->
            <li class="nav-item {{(request()->is('admin-page/category*')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category"
                    aria-expanded="true" aria-controls="category">
                    <i class="fas fa-list"></i>
                    <span>Danh mục sản phẩm</span>
                </a>
                <div id="category" class="collapse {{(request()->is('admin-page/category*')) ? 'show' : '' }}" aria-labelledby="category" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{(request()->is('admin-page/category/add')) ? 'active' : '' }}" href="{{url('admin-page/category/add')}}">Thêm danh mục</a>
                        <a class="collapse-item {{(request()->is('admin-page/category/list')) ? 'active' : '' }}" href="{{url('admin-page/category/list')}}">Danh sách danh mục</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <!-- Nav Item - Pages Collapse sản phẩm -->
            <li class="nav-item {{(request()->is('admin-page/product*')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product"
                    aria-expanded="true" aria-controls="product">
                    <i class="fas fa-clock"></i>
                    <span>Sản phẩm</span>
                </a>
                <div id="product" class="collapse {{(request()->is('admin-page/product*')) ? 'show' : '' }}" aria-labelledby="product" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{(request()->is('admin-page/product/add')) ? 'active' : '' }}" href="{{url('admin-page/product/add')}}">Thêm sản phẩm</a>
                        <a class="collapse-item {{(request()->is('admin-page/product/list')) ? 'active' : '' }}" href="{{url('admin-page/product/list')}}">Danh sách sản phẩm</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Pages Collapse slide -->
            <li class="nav-item {{(request()->is('admin-page/slide*')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#slide"
                    aria-expanded="true" aria-controls="slide">
                    <i class="fas fa-images"></i>
                    <span>Slide</span>
                </a>
                <div id="slide" class="collapse {{(request()->is('admin-page/slide*')) ? 'show' : '' }}" aria-labelledby="slide" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{(request()->is('admin-page/slide/add')) ? 'active' : '' }}" href="{{url('admin-page/slide/add')}}">Thêm slide</a>
                        <a class="collapse-item {{(request()->is('admin-page/slide/list')) ? 'active' : '' }}" href="{{url('admin-page/slide/list')}}">Danh sách slide</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Pages Collapse  -->
            <li class="nav-item {{(request()->is('admin-page/order*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{url('admin-page/order/list')}}">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Đơn hàng</span>
                </a>
            </li>
            <!-- Nav Item - Pages Collapse  -->
            <li class="nav-item {{(request()->is('admin-page/review*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{url('admin-page/review/list')}}">
                    <i class="far fa-comment-dots"></i>
                    <span>Đánh giá</span>
                </a>
            </li>
            <!-- Nav Item - Pages Collapse  -->
            <li class="nav-item {{(request()->is('admin-page/customer*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{url('admin-page/customer/list')}}">
                    <i class="fas fa-male"></i>
                    <span>Khách hàng</span>
                </a>
            </li>
            <!-- Nav Item - Pages Collapse  admin-->
            <li class="nav-item {{(request()->is('admin-page/admin*')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin"
                    aria-expanded="true" aria-controls="admin">
                    <i class="far fa-id-badge"></i>
                    <span>Quản trị viên</span>
                </a>
                <div id="admin" class="collapse {{(request()->is('admin-page/admin*')) ? 'show' : '' }}" aria-labelledby="admin" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{(request()->is('admin-page/admin/add')) ? 'active' : '' }}" href="{{url('admin-page/admin/add')}}">Thêm quản trị viên</a>
                        <a class="collapse-item {{(request()->is('admin-page/admin/list')) ? 'active' : '' }}" href="{{url('admin-page/admin/list')}}">Danh sách quản trị viên</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{(Auth::guard('account_admin')->check())?Auth::guard('account_admin')->user()->person->full_name:'Chưa đăng nhập'}}</span>
                                <i class="fas fa-user-circle fa-2x" style="color: orange"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid begin-page-content">
                    @if(session('msg'))
                        <div class="alert1 alert alert-{{session('typeMsg')}} alert-dismissible text-center mt-1" style="position: absolute;right: 0;z-index: 5">{{ session('msg') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    @endif
                	@yield('content')


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; T-SHOP 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn muốn đăng xuất?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn muốn rời phiên đăng nhập.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
                    <a class="btn btn-primary" href="{{url('/admin-page/logout')}}">Đăng xuất</a>
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

    <!-- Page level plugins -->
    <script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>

<!--     <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> -->
    <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts -->
  <!--   <script src="{{asset('backend/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('backend/js/demo/chart-pie-demo.js')}}"></script> -->
    <!-- <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script> -->

    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable({
           "language": {
                "search": "Tìm kiếm :",
                "lengthMenu": "Hiện số bản ghi : _MENU_",
                "info": "Hiện từ _START_ đến _END_ trong _TOTAL_ bản ghi",
                "infoEmpty": "Không có bản ghi nào",
                "infoFiltered": " - lọc từ tổng _MAX_ bản ghi",
                "zeroRecords": "Không có bản ghi phù hợp",
                "paginate":{
                    "previous": "Trước",
                    "next": "Sau"
                }
            },

        });

         /*slide*/
        $('.slide').change(function(){
            $('.slide-display').css('display','block');
            $('.slide-display').attr('src',URL.createObjectURL(event.target.files[0]));
        });
        /*alert all  page*/
        window.setTimeout(function() {
                $(".alert1").fadeOut(2000);
                $(".alert1").setTimeout(function(){
                    $(this).remove();
                });
            }, 3000);

    });

    </script>
    @yield('js')
</body>

</html>
