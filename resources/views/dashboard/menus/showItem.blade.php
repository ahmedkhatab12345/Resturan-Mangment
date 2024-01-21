@extends('layouts.dashboard.app')
@section('content') 
<!-- row opened -->
<div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>email</th>
                                <th>section</th>
                                <th>phone</th>
                                <th>appointments</th>
                                <th>Status</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(is_array($items)||is_object($items))
                            @foreach($items as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$item->name}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">Processes<i class="fas fa-caret-down mr-1"></i></button>
                                        <div class="dropdown-menu tx-13">
                                            <a class="dropdown-item" href="{{route('Doctors.edit',$doctor->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp;تعديل البيانات</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target=""><i   class="text-primary ti-key"></i>&nbsp;&nbsp;تغير كلمة المرور</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target=""><i   class="text-warning ti-back-right"></i>&nbsp;&nbsp;تغير الحالة</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target=""><i   class="text-danger  ti-trash"></i>&nbsp;&nbsp;حذف البيانات</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
 
@endsection