@extends('back.layouts.master')
@section('title',$title)
@section('head')

    <script type="text/javascript" src="/back/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/pages/form_layouts.js"></script>

@endsection
@section('page-header')
    @include('back.layouts.include.page-header',compact('crumbs'))
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('back.layouts.include.alert-messages')
            <!-- Basic layout-->
            <form action="{{route('admin.category.store')}}" class="form-horizontal" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">{{$title}}</h5>
                        <div class="heading-elements">
                            <a href="{{route('admin.category')}}"><span class="label label-success">KATEQORİYA LİSTİ</span></a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ad:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Kateqoriyanın Növü:</label>
                            <div class="col-lg-9">
                                <label class="radio-inline">
                                    <input type="radio" class="styled" name="checkType" onchange="parentCheck(this)" >
                                    Üst Kateqoriya
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" class="styled" name="checkType" onchange="childCheck(this)">
                                    Alt Kateqoriya
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Üst Kateqoriya:</label>
                            <div class="col-lg-9">
                                <select class="select" name="parent_id" disabled id="parentId">
                                    <option>Üst Kateqoriyanı Seçin</option>
                                    @if($cateqories->count()>0)
                                        @foreach($cateqories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Göstəriləcək Domen:</label>
                            <div class="col-lg-9">
                                <select  class="form-control" name="domain" disabled id="domain">
                                    <option>Domen Seçin</option>
                                    @if($domains->count()>0)
                                        @foreach($domains as $domain)
                                            <option  value="{{$domain->id}}">{{$domain->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Şəkil:</label>
                            <div class="col-lg-9">
                                <input type="file" name="photo" id="categoryPhoto" class="file-styled" disabled>
                                <span class="help-block">Qəbul edilən uzantılar: gif, png, jpg, jpeg. Maksimum həcm 2Mb olmalıdır.</span>
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

@section('foot')
    <script>
        function parentCheck(checkbox) {
            var domain=document.getElementById('domain');
            var parentId=document.getElementById('parentId');
            var categoryPhoto=document.getElementById('categoryPhoto');

            if(checkbox.checked == true){
                parentId.disabled = true;
                domain.disabled = false;
                categoryPhoto.disabled = true;
            }
        }


        function childCheck(checkbox) {
            var domain=document.getElementById('domain');
            var parentId=document.getElementById('parentId');
            var categoryPhoto=document.getElementById('categoryPhoto');

            if(checkbox.checked == true){
                parentId.disabled = false;
                domain.disabled = true;
                categoryPhoto.disabled = false;
            }
        }

    </script>
@endsection