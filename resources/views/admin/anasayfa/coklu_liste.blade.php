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
                                                <th>Durum</th>
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
                                                <td><input type="checkbox" class="coklu" data-id="{{$resimler->id}}" id="{{$resimler->id}}" switch="success" {{ $resimler->durum ? 'checked' : ''}}>
                                                    <label for="{{ $resimler-> id}}" data-on-label="Yes" data-off-label="No"></label>
                                                </td>
                                                <td>
                                                @if(Auth::user()->can('hak.coklu.duzenle'))
                                                    <a href="{{route('coklu.duzenle',$resimler->id)}}" class="btn btn-info sm m-2" title="Düzenle" >
                                                        <i class="fas fa-edit"></i>
                                                        </a>
                                                        @endif
                                                @if(Auth::user()->can('hak.coklu.sil'))       
                                                        <a href="{{route('coklu.sil',$resimler->id)}}" class="btn btn-danger sm" title="Sil" id="sil">
                                                            <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                        @endif
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