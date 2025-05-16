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
                                        <h4 class="card-title"> Rol Ekle</h4>
                                        <form method="post" action="{{route('rol.ekle.form')}}" id="myForm">
                                            @csrf
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Rol Adı</label>
                                            <div class="col-sm-10 form-group" >
                                                <input class="form-control" type="text" placeholder="Rol Adı" name="name" >
                                            </div>
                                        </div>
                                        
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Rol Ekle">
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