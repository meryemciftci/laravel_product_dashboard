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
                                        <h4 class="card-title">Hakkımızda Düzenle</h4>
                                        <form method="post" action="{{ route('hakkimizda.guncelle') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$hakkimizda->id ?? ''}}" >
                                            <input type="hidden" name="onceki_resim" value="{{$hakkimizda->id ?? ''}}" >
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlık</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Başlık" name="baslik" id="example-text-input" value="{{$hakkimizda->baslik ?? ''}}">
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Kısa Başlık</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="kisa_baslik" type="text" placeholder="Kısa Başlık" id="example-text-input" value="{{$hakkimizda->kisa_baslik ?? ''}}">
                                            </div>
                                        </div>
                                        <!-- end row -->
                                         <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Kısa Açıklama</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="kisa_aciklama" type="text" placeholder="Kısa Açıklama" id="example-text-input" rows="4">{{$hakkimizda->kisa_aciklama ?? ''}}</textarea>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <!-- end row -->
                                         <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Açıklama</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="aciklama" type="text" placeholder="Açıklama" id="elm1">{{$hakkimizda->aciklama ?? ''}}</textarea>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2">Resim</label>
                        <div class="col-sm-10">
                            <input type="file" name="resim" id="resim" class="form-control" >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" src="{{ (!empty($hakkimizda->resim)) ? url($hakkimizda->resim): url('upload/resim-yok.jpg') }}" alt="" id="resimGoster">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Hakkımızda Güncelle">
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

@endsection('')