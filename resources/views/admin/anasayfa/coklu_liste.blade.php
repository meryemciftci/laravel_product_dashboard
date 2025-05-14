@extends('admin.admin_master')

@section('admin')
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Çoklu Resimler</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Çoklu Liste</h4>
                              
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Sıra</th>
                                                <th>Resim</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @php
                                                ($s = 1)
                                                @endphp
                                                @foreach($coklu_resimler  as $resimler)
                                            <tr>
                                                <td>{{ $s++ }}</td>
                                                <td></td>
                                                <td><img src="{{asset($resimler->resim)}}" style="height:50px; width:50px;"></style></td>
                                                <td>
                                                    <a href="{{route('coklu.duzenle',$resimler->id)}}" class="btn btn-info sm m-2" title="Düzenle" >
                                                        <i class="fas fa-edit"></i>
                                                        <a href="{{route('coklu.sil',$resimler->id)}}" class="btn btn-danger sm" title="Sil" id="sil">
                                                            <i class="fa fa-trash-alt"></i>
</a>
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