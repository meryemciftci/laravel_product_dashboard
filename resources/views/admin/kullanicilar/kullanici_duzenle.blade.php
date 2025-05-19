@extends('admin.admin_master')  
<!-- #css js sabitlerini getiriyor. -->

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<div class="page-content">
    <div class="container-fluid">
<div class="row">
                            <div class="col-xl-5 col-md-12">
                                <div class="card" style="height:600px;">
                                    <div class="card-body">
                                        <h4 class="card-title">Kullanıcı Düzenle</h4>
                                        <form method="post" action="{{ route('kullanici.guncelle',$user->id)}}" id="myForm">
                                            @csrf
                                            

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Ad Soyad</label>
                                            <div class="col-sm-9" form-group>
                                                <input class="form-control" type="text" placeholder="Ad Soyad" name="name"  value="{{$user->name}}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9" form-group>
                                                <input class="form-control" type="email" placeholder="Email" name="email" value="{{$user->email}}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Kullanıcı Adı</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Kullanıcı Adı" value="{{$user ->username}}" name="username" id="example-text-input">
                                                @error('username')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Telefon</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Telefon" value="{{$user ->telefon}}" name="telefon" id="example-text-input">
                                                @error('telefon')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Rol Adı</label>
                                            <div class="col-sm-9 form-group" >
                                                <select class="form-select" aria-label="Default select examle" name="rol">
                                                    <option selected="">Lütfen bir rol seçiniz</option>
                                                    @foreach($roller as $rol)
                                                    <option value="{{ $rol->id }}" {{ $user->hasRole($rol->name) ? 'selected' : ''}}>{{$rol->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

 <label for="example-text-input" class="col-sm-3 col-form-label"> </label>
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Kullanıcı Düzenle">
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

				email: 
				{
					required : true,
				},


            }, // end rules

            messages :
            {
            	name: 
            	{
            		required : 'Ad soyad giriniz',
            	},

            	email: 
            	{
            		required : 'Email giriniz',
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

@endsection('')