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
                                        <h4 class="card-title">Yorum Ekle</h4>
                                        <form method="post" action="{{route('yorum.form')}}" id="myForm">
                                            @csrf
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Ad Soyad</label>
                                            <div class="col-sm-10 form-group">
                                                <input class="form-control" type="text" placeholder="Ad Soyad" name="adi">
                                                @error('adi')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                       <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Yorum</label>
                                            <div class="col-sm-10 form-group" >
                                                <textarea class="form-control" type="text" placeholder="Yorum" name="metin"></textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3" >
                                            <label for="example-text-input" class="col-form-label">Sıra no</label>
                                            <div class="col-sm-10 form-group" >
                                                <input class="form-control" type="number" placeholder="Sıra no" name="sirano" value="1" >
                                            </div>
                                        </div>
                    
                    
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Yorum Ekle">
</form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#resim').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#resimGoster').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#resim').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#resimGoster').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

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
            		required : 'Ad soyad boş olamaz',
            	},

            	metin: 
            	{
            		required : 'Metin giriniz',
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