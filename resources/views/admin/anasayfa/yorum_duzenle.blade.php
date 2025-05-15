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
                                        <h4 class="card-title">Yorum Düzenle</h4>
                                        <form method="post" action="{{ route('yorum.guncelle') }}" id="myForm">
                                            @csrf

                                            <input type="hidden" name="id" value="{{$yorumduzenle ->id}}">

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Ad soyad</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Ad soyad" value="{{$yorumduzenle ->adi}}" name="adi" id="example-text-input">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Yorum</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" type="text" placeholder="Yorum" name="metin" id="example-text-input">{{$yorumduzenle ->metin}}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Sıra no</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Sıra no" value="{{$yorumduzenle ->sirano}}" name="sirano" id="example-text-input">
                                            </div>
                                        </div>
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Yorum Güncelle">
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
				adi: 
				{
					required : true,
				},

				metin: 
				{
					required : true,
				},
                sirano: 
				{
					required : true,
				},

            }, // end rules

            messages :
            {
            	adi: 
            	{
            		required : 'Ad soyad olamaz',
            	},

            	metin: 
            	{
            		required : 'metin giriniz',
            	},
                sirano: 
            	{
            		required : 'Sıra no giriniz',
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