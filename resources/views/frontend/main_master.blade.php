<!doctype html>
<html class="no-js" lang="tr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="author" content="@yield('author')">
        <meta name="description" content="@yield('aciklama')">
        <meta name="keywords" content="@yield('anahtar')">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/img/favicon.png')}}">
        <!-- Place favicon.ico in the root directory -->
		<!-- CSS here -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/default.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">

        <!-- bildiri -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
        <!-- bildiri -->

    </head>
    <body>

    
        <!-- preloader-start  dönen kısım -->
        <!-- <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div> -->
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        @include('frontend.include.header')
        <!-- header-area-end -->


    
       
        <!-- main-area -->
        <main>
            @yield('main')
        </main>
        <!-- main-area-end -->



        <!-- Footer-area -->

        @include('frontend.include.footer')
        <!-- Footer-area-end -->




		<!-- JS here -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/element-in-view.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    

        <!-- bildiri -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

            
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


     <!-- validate -->
     <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>
     <!-- validate -->
<script type="text/javascript">
	$(document).ready(function (){
		$('#myForm').validate({
			rules: 
			{
				adi: 
				{
					required : true,
				},

				email: 
				{
					required : true,
				},

				telefon: 
				{
					required : true,
				},

				konu: 
				{
					required : true,
				},
                mesaj: 
				{
					required : true,
				},
            }, // end rules

            messages :
            {
            	adi: 
            	{
            		required : 'Ad soyad giriniz',
            	},

            	email: 
            	{
            		required : 'Email giriniz',
            	},

            	telefon: 
            	{
            		required : 'Telefon numarası giriniz',
            	},

            	konu: 
            	{
            		required : 'Konu giriniz',
            	},
                mesaj: 
            	{
            		required : 'Mesaj giriniz',
            	},
            }, // end message 

            errorElement : 'span',
            errorPlacement: function (error,element) {
            	error.addClass('invalid-feedback');
            	element.closest('.form-group').append(error);
            },

            highlight : function(element, errorClass, validClass){
            	$(element).addClass('is-invalid');
            },

            unhighlight : function(element, errorClass, validClass){
            	$(element).removeClass('is-invalid');
            },
        });
	});
</script>

    </body>
</html>
