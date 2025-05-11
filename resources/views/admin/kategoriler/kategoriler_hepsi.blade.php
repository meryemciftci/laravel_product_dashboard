@extends('admin.admin_master')

@section('admin')
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Kategoriler Hepsi</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Kategoriler</h4>
                              
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Sıra</th>
                                                <th>Kategori Adı</th>
                                                <th>Resim</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @php
                                                ($s = 1)
                                                @endphp
                                                @foreach($kategorihepsi  as $kategoriler)
                                            <tr>
                                                <td>{{ $s++ }}</td>
                                                <td>{{ $kategoriler->kategori_adi }}</td>
                                                <td><img src=" {{asset($kategoriler->resim ) }}" style="height:50px; width:50px;"></style></td>
                                                <td>
                                                    <a href="{{route('kategori.duzenle',$kategoriler->id)}}" class="btn btn-info sm m-2" title="Düzenle" >
                                                        <i class="fas fa-edit"></i>
</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
@endsection