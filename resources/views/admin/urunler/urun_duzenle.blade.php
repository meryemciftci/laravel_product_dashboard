@extends('admin.admin_master')  
<!-- #css js sabitlerini getiriyor. -->

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right:3px;
        font-weight:700;
        color:#228b22;
        padding:3px;
    }
    </style>


<div class="page-content">
    <div class="container-fluid">
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Ürün Düzenle</h4>
                                        <form method="post" action="{{ route('urun.guncelle.form') }}" enctype="multipart/form-data" id="myForm">
                                            @csrf

                                            <input type="hidden" name="id" value="{{$urunler ->id}}">
                                            <input type="hidden" name="onceki_resim" value="{{$urunler ->resim}}">



<div class="col-md-12">
    <div class="row">
        <div class="col-md-8">
                 <div class="row mb-3">
                  <label for="example-text-input" class="col-form-label">Başlık</label>
                         <div class="col-sm-12" form-group>
                            <input class="form-control" type="text" placeholder="Başlık" name="baslik" value ="{{ $urunler -> baslik }}">
                            @error('baslik')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                         </div>
                    </div>
                    <!--- end row --->
                <div class="row mb-3">
                  <label for="example-text-input" class="col-form-label">Tag</label>
                         <div class="col-sm-12" form-group>
                            <input class="form-control" type="text" name="tag" data-role="tagsinput" value ="{{ $urunler -> tag }}">
                         </div>
                </div>
                    <!--- end row --->
                <div class="row mb-3">
                <div class="col-sm-12" form-group>
                  <label for="example-text-input" class="col-form-label">Metin</label>
                            <textarea id="elm1" name="metin" type="text">
                                {{ $urunler -> metin }}
                            </textarea>
                         </div>
                </div>
                    <!--- end row --->
</div> <!--- col-md-8 bitti --->

                <div class="col-md-4" >
                            <div class="row mb-3">
                                            <label class="col-form-label">Ürün Seç</label>
                                            <div class="col-sm-12">
                                                <select class="form-select" aria-label="Default select example" name="kategori_id">
                                                    <option selected="">Kategori Seç</option>

                                                    @foreach($kategoriler as $kategori)
                                                    <option value="{{$kategori -> id}}" {{$kategori ->id == $urunler->kategori_id ?'selected' : ''}}>{{ $kategori -> kategori_adi}}</option>
                                                    @endforeach
                                                    </select>
                                            </div>
                            </div><!--- end row --->


                           <div class="row mb-3">
                                      <label for="example-text-input" class="col-form-label">Alt Kategori Adı</label>
                                            <div class="col-sm-12" form-group>
                                                <select class="form-select" aria-label="Default select example" name="altkategori_id" >
                                                <option> </option>
                                                @foreach($altkategoriler as $altkategori)
                                                <option value="{{ $altkategori -> id }}" {{$kategori ->id == $urunler->kategori_id ?'selected' : ''}}>{{ $altkategori -> altkategori_adi}} </option>
                                                @endforeach
                                                </select>
                                            </div>
                           </div><!--- end row --->

                           <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Sıra no</label>
                                            <div class="col-sm-12" form-group>
                                                <input class="form-control" type="number" placeholder="Sıra no" name="sirano" value="{{ $urunler->sirano }}">
                                            </div>
                            </div><!--- end row --->

                          <div class="row mb-3">
                                <label for="example-text-input">Resim</label>
                                <div class="col-sm-12" form-group>
                                    <input type="file" name="resim" id="resim" class="form-control" >
                                                                                    @error('resim')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                </div>
                         </div>

                        <div class="row mb-3">
                                    <label for="example-text-input"></label>
                                    <div class="col-sm-12">
                                        <img class="rounded avatar-lg" src="{{(!empty($urunler->resim))?url($urunler->resim):url('upload/resim-yok.jpg') }}" alt="" id="resimGoster">
                                    </div>
                        </div>


                        <div class="row mb-3">
                                            <label for="example-text-input" class=" col-form-label">Anahtar</label>
                                            <div class="col-sm-12" form-group>
                                                <input class="form-control" type="text" placeholder="Anahtar" name="anahtar" value="{{ $urunler->anahtar }}">
                                            </div>
                        </div>
                        <div class="row mb-3" >
                                            <label for="example-text-input" class="col-form-label">Açıklama</label>
                                            <div class="col-sm-12" form-group>
                                                <input class="form-control" type="text" placeholder="Açıklama" name="aciklama" value="{{ $urunler->aciklama }}">
                                            </div>
                        </div>



                </div><!--- col-md-4 bitti --->
                 <input type="submit" class="btn btn-info waves-effect waves-light" value="Ürün Güncelle">
                                
</div>   <!-- row bitti -->  
</div>  <!-- col-m-12 bitti -->  


                   
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
<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('#resim').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#resimGoster').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script> -->

<!-- boş olamaz no refresh -->
<script type="text/javascript">
	$(document).ready(function (){
		$('#myForm').validate({
			rules: 
			{
				altkategori_id: 
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
            	altkategori_id: 
            	{
            		required : 'Alt kategori boş olamaz',
            	},

            	sirano: 
            	{
            		required : 'Sıra numarası  giriniz',
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
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name = "kategori_id"]').on('change', function (){
            var kategori_id = $(this).val();
            if(kategori_id){
                $.ajax({
                    url:"{{url('/altkategoriler/ajax')}}/"+kategori_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        $('select[name = "altkategori_id"]').html('');
                        var alt = $('select[name = "altkategori_id"]').empty();   //kategori seçmeden alt kategori boş gelir
                        $.each(data, function(key,value){  //each() bütün verileri döndürüp yazdırma
                            $('select[name = "altkategori_id"]').append('<option value="'+ value.id+'"> '+value.altkategori_adi + '</option>');
                        });
                    },
                });
            }else{
                alert('danger');
            }
        });
    });



</script>
@endsection