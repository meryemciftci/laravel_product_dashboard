<!doctype html>
<html lang="tr">


<head>
    <meta charset="utf-8" />
    <title>Dashboard | Upcube - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <!-- jquery.vectormap css -->
    <link href="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />  

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- bildiri -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <!-- bildiri -->

    <!-- tag -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" >
    <!-- tag -->

</head>

<body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


            <!-- header -->
            @include('admin.sabit.header')
            <!-- header -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.sabit.sidebar')
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                @yield('admin')
                <!-- End Page-content -->

                <!-- footer -->
                @include('admin.sabit.footer')
                <!-- footer -->
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->

        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

        
        <!-- apexcharts -->
        <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- jquery.vectormap map -->
        <script src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        
        <!-- Responsive examples -->
        <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('backend/assets/js/pages/dashboard.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/assets/js/app.js') }}"></script>

        <!-- Datatable init js -->
        <script src="{{asset('backend/assets/js/pages/datatables.init.js')}}"></script>

        <!-- bildiri -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            
        @if(Session::has('bildirim'))
           var type = "{{ Session::get('alert-type','info') }}"
           switch(type){
           case 'info':
            toastr.info(" {{ Session::get('bildirim') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('bildirim') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('bildirim') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('bildirim') }} ");
            break; 
        }
        @endif 
    </script>
    <!-- bildiri -->
     <!-- sweetalert -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
     <script src="{{ asset('backend/assets/js/sweet.js') }}"></script>
     <!-- sweetalert -->

     <!-- validate -->
     <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>
     <!-- validate -->



     <!-- ürün aktif pasif durum alanı -->
    <script>
        $(function(){
            $('.urunler').change(function(){
                var durum = $(this).prop('checked') == true ? 1 : 0;  // işaretli ise durum değişkeni 1 olur
                var urun_id = $(this).data('id');  // ürün id si alınır data_id den
                $.ajax({
                    type:"GET",  //urun/durum adresşne çağrı
                    dataType : "json",
                    url : "/urun/durum",
                    data: {'durum':durum,'urun_id':urun_id},
                    success: function(data){   //başarılı olduğunda konsolo yazılır
                        console.log(data.success)
                    }
                });

            });
        });
    </script>
     <!-- aktif pasif durum alanı -->

   <!--süreç aktif pasif durum alanı -->
    <script>
        $(function(){
            $('.surec').change(function(){
                var durum = $(this).prop('checked') == true ? 1 : 0;  // işaretli ise durum değişkeni 1 olur
                var urun_id = $(this).data('id');  // ürün id si alınır data_id den
                $.ajax({
                    type:"GET",  //urun/durum adresşne çağrı
                    dataType : "json",
                    url : "/surec/durum",
                    data: {'durum':durum,'urun_id':urun_id},
                    success: function(data){   //başarılı olduğunda konsolo yazılır
                        console.log(data.success)
                    }
                });

            });
        });
    </script>
     <!-- aktif pasif durum alanı -->

        <!--yorum aktif pasif durum alanı -->
    <script>
        $(function(){
            $('.yorumlar').change(function(){
                var durum = $(this).prop('checked') == true ? 1 : 0;  // işaretli ise durum değişkeni 1 olur
                var urun_id = $(this).data('id');  // ürün id si alınır data_id den
                $.ajax({
                    type:"GET",  //urun/durum adresşne çağrı
                    dataType : "json",
                    url : "/yorum/durum",
                    data: {'durum':durum,'urun_id':urun_id},
                    success: function(data){   //başarılı olduğunda konsolo yazılır
                        console.log(data.success)
                    }
                });

            });
        });
    </script>
     <!-- aktif pasif durum alanı -->

 <!--Kullanıcılar aktif pasif durum alanı -->
    <script>
        $(function(){
            $('.kullanicilar').change(function(){
                var durum = $(this).prop('checked') == true ? 1 : 0;  // işaretli ise durum değişkeni 1 olur
                var urun_id = $(this).data('id');  // ürün id si alınır data_id den
                $.ajax({
                    type:"GET",  //urun/durum adresşne çağrı
                    dataType : "json",
                    url : "/kullanici/durum",
                    data: {'durum':durum,'urun_id':urun_id},
                    success: function(data){   //başarılı olduğunda konsolo yazılır
                        console.log(data.success)
                    }
                });

            });
        });
    </script>
 <!--Kullanıcılar aktif pasif durum alanı -->


  <!--CokluResim aktif pasif durum alanı -->
    <script>
        $(function(){
            $('.coklu').change(function(){
                var durum = $(this).prop('checked') == true ? 1 : 0;  // işaretli ise durum değişkeni 1 olur
                var urun_id = $(this).data('id');  // ürün id si alınır data_id den
                $.ajax({
                    type:"GET",  //urun/durum adresşne çağrı
                    dataType : "json",
                    url : "/coklu/durum",
                    data: {'durum':durum,'urun_id':urun_id},
                    success: function(data){   //başarılı olduğunda konsolo yazılır
                        console.log(data.success)
                    }
                });

            });
        });
    </script>
 <!--Kullanıcılar aktif pasif durum alanı -->


     <!-- tag -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <!-- tag -->

            <!--tinymce js-->
        <script src="{{asset('backend/assets/libs/tinymce/tinymce.min.js')}}"></script>

        <!-- init js -->
        <script src="{{asset('backend/assets/js/pages/form-editor.init.js')}}"></script>

</body>
</html>