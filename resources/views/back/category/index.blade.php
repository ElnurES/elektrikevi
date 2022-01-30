@extends('back.layouts.master')
@section('title',$title)
@section('head')

    <!-- Theme JS files -->
    <script type="text/javascript" src="/back/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/pages/datatables_responsive.js"></script>
@endsection
@section('page-header')
    @include('back.layouts.include.page-header',compact('crumbs'))
@endsection
@section('content')
    @include('back.layouts.include.alert-messages')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{$title}}</h5>
            <div class="heading-elements">
                <a href="{{route('admin.category.create')}}"><span class="label label-success">YENİ KATEQORİYA</span></a>
            </div>
        </div>

        <table class="table datatable-responsive-row-control">
            <thead>
            <tr>
                <th></th>
                <th>Şəkil</th>
                <th>Üst Kateqoriya</th>
                <th>Ad</th>
                <th>Slug</th>
                <th>Domain</th>
                <th>Yenilənmə Tarixi</th>
                <th class="text-center">Düzəlişlər</th>
            </tr>
            </thead>
            <tbody>
            @if($categorys->count()>0)
                @foreach($categorys as $category)
                    <tr>
                        <td></td>
                        <td>
                            <a href="{{route('admin.category.show.product',$category->slug)}}">
                                <img style="width: 50px;" src="{{asset("uploads/catalog").'/'.$category->photo}}"  alt="">
                            </a>
                        </td>
                        <td><a href="{{route('admin.category.show.product',$category->slug)}}">{{$category->parentWithDefault->name}}</a></td>
                        <td><a href="{{route('admin.category.show.product',$category->slug)}}">{{$category->name}}</a></td>
                        <td><a href="{{route('admin.category.show.product',$category->slug)}}">{{$category->slug}}</a></td>
                        <td><span class="label label-success">{{$category->categoryDomain->name}}</span></td>
                        <td>{{$category->category_updated_at_no_pm()}}</td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{route('admin.category.edit',$category->slug)}}"><i class="icon-database-edit2"></i> Yenilə</a></li>
                                        <li><a href="{{route('admin.category.show.product',$category->slug)}}"><i class="icon-eye"></i> Məhsulları</a></li>
                                        <li><a  onclick='checkDeleteConfrim("{{route('admin.category.destroy',$category->slug)}}","{{count($category->child)}}")'><i class="icon-database-remove"></i> Sil</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection

@section('foot')
    <script>
        function checkDeleteConfrim(url,parentId) {
            if(parentId==0) {
                swal({
                    title: "Silmək istədiynizdən əminsizmi?",
                    text: "Silinəndən sonra bu əməliyyatı bərpa edə bilməyəcəksiniz!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            location.href = url;
                        } else {
                            swal("Heç bir əməliyyat aparılmadı");
                        }
                    });
            } else {
                swal({
                title: "Üst kateqoriya silinə bilməz!",
                    text: "İlk öncə bu kateqoriyanın alt kateqoriyalarını silməlisiniz!.",
                    icon: "warning",
                    button: "Ok",
                });
            }


        }
    </script>

@endsection