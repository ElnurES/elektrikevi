@extends('back.layouts.master')
@section('title',$title)
@section('page-header')
    @include('back.layouts.include.page-header',compact('crumbs'))
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
        @include('back.layouts.include.alert-messages')
        <!-- Basic layout-->
            <form action="{{route('admin.user.update',$user->id)}}" class="form-horizontal" method="Post">
                @csrf
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">{{$title}}</h5>
                        <div class="heading-elements">
                            <a href="{{route('admin.user')}}"><span class="label label-success">İSTİFADƏÇİLƏRƏ QAYIT</span></a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Göstəriləcək Domen:</label>
                            <div class="col-lg-9">
                                <select  class="form-control" name="is_admin">
                                    <option value="0" {{$user->is_admin==0 ? 'selected' : ''}}>İstifadəçi</option>
                                    <option value="1" {{$user->is_admin==1 ? 'selected' : ''}}>Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ad Soayad:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="fullname" value="{{old('fullname',$user->fullname)}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-9">
                                <input type="email" class="form-control" name="email" value="{{old('email',$user->email)}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ünvan:</label>
                            <div class="col-lg-9">
                                <textarea rows="3" cols="3" class="form-control" name="address" >{{old('address',$user->detail->address)}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Mobil 1:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="mobil_1" value="{{old('mobil_1',$user->detail->mobil_1)}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Mobil 2:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="mobil_2" value="{{old('mobil_2',$user->detail->mobil_2)}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Şifrə:</label>
                            <div class="col-lg-9">
                                <input type="password" class="form-control" name="password" >
                            </div>
                        </div>


                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Əlavə et <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /basic layout -->
        </div>

    </div>
@endsection
