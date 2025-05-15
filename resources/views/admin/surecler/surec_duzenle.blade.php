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
                                        <h4 class="card-title">Süreç Düzenle</h4>
                                        <form method="post" action="{{ route('surec.guncelle') }}" id="myForm">
                                            @csrf

                                            <input type="hidden" name="id" value="{{$surecduzenle ->id}}">

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Süreç</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Süreç" value="{{$surecduzenle ->surec}}" name="surec" id="example-text-input">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlık</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Başlık" value="{{$surecduzenle ->baslik}}" name="baslik" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Açıklama</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Açıklama" value="{{$surecduzenle ->aciklama}}" name="aciklama" id="example-text-input">
                                                @error('açiklama')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Sıra no</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Açıklama" value="{{$surecduzenle ->sirano}}" name="sirano" id="example-text-input">
                                            </div>
                                        </div>
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Süreç Güncelle">
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
				surec: 
				{
					required : true,
				},

				baslik: 
				{
					required : true,
				},
                sirano: 
				{
					required : true,
				},


				aciklama: 
				{
					required : true,
				},
            }, // end rules

            messages :
            {
            	surec: 
            	{
            		required : 'Süreç boş olamaz',
            	},

            	baslik: 
            	{
            		required : 'Başlık giriniz',
            	},
                sirano: 
            	{
            		required : 'Sıra no giriniz',
            	},


            	aciklama: 
            	{
            		required : 'Açıklama giriniz',
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