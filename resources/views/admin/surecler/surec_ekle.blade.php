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
                                        <h4 class="card-title">Süreç Ekle</h4>
                                        <form method="post" action="{{route('surec.form')}}" id="myForm">
                                            @csrf
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Süreç</label>
                                            <div class="col-sm-10 form-group">
                                                <input class="form-control" type="text" placeholder="Sureç" name="surec">
                                                @error('surec')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                       <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Başlık</label>
                                            <div class="col-sm-10 form-group" >
                                                <input class="form-control" type="text" placeholder="Başlık" name="baslik">
                                            </div>
                                        </div>

                                        <div class="row mb-3" >
                                            <label for="example-text-input" class="col-form-label">Açıklama</label>
                                            <div class="col-sm-10 form-group" >
                                                <textarea class="form-control" type="text" placeholder="Açıklama" name="aciklama" ></textarea>
                                                 @error('aciklama')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3" >
                                            <label for="example-text-input" class="col-form-label">Sıra no</label>
                                            <div class="col-sm-10 form-group" >
                                                <input class="form-control" type="number" placeholder="Sıra no" name="sirano" value="1" >
                                            </div>
                                        </div>
                    
                    
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Süreç Ekle">
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