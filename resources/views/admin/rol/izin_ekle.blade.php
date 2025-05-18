@extends('admin.admin_master')  
<!-- #css js sabitlerini getiriyor. -->

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<div class="page-content">
    <div class="container-fluid">
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"> İzin Ekle</h4>
                                        <form method="post" action="{{route('izin.ekle.form')}}" id="myForm">
                                            @csrf
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">İzin Adı</label>
                                            <div class="col-sm-10 form-group" >
                                                <input class="form-control" type="text" placeholder="İzin Adı" name="name" >
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Grup Adı</label>
                                            <div class="col-sm-10 form-group" >
                                                <select class="form-select" aria-label="Default select examle" name="grup_adi">
                                                    <option selected="">Lütfen bir grup seçiniz</option>
                                                    <option value="rolizin">Rol & İzin</option>
                                                    <option value="yetkiler">Yetkiler</option>
                                                    <option value="kullanicilar">Kullanıcılar</option>
                                                    <option value="banner">Banner</option>
                                                    <option value="hakkimizda">Hakkımızda</option>
                                                    <option value="kategoriler">Kategoriler</option>
                                                    <option value="altkategoriler">AltKategoriler</option>
                                                    <option value="urunler">Ürünler</option>
                                                    {{-- <option value="bloglar">Bloglar</option> --}}
                                                    {{-- <option value="icerikler">İçerikler</option> --}}
                                                    <option value="surecler">Süreçler</option>
                                                    <option value="yorumlar">Yorumlar</option>
                                                    {{-- <option value="footer">Footer</option> --}}
                                                    <option value="seo">SEO Ayarları</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="İzin Ekle">
</form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
</div>
</div>
<!-- boş olamaz no refresh -->
<script type="text/javascript">
	$(document).ready(function (){
		$('#myForm').validate({
			rules: 
			{
				name: 
				{
					required : true,
				},

            }, // end rules

            messages :
            {
            	name: 
            	{
            		required : 'İzin adı giriniz',
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

@endsection