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
                <a href="{{route('admin.user.create')}}"><span class="label label-success">YENİ İSTİFADƏÇİ</span></a>
            </div>
        </div>

        <table class="table datatable-responsive-row-control">
            <thead>
            <tr>
                <th></th>
                <th>Ad Soyad</th>
                <th>Email</th>
                <th>Ünvan</th>
                <th>Mobil 1</th>
                <th>Mobil 2</th>
                <th>Status</th>
                <th>Yenilənmə Tarixi</th>
                <th class="text-center">Düzəlişlər</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if($users->count()>0)
                @foreach($users as $user)
                    <tr>
                        <td></td>
                        <td>{{$user->fullname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{isset($user->detail->address) ? $user->detail->address : ''}}</td>
                        <td>{{isset($user->detail->mobil_1) ? $user->detail->mobil_1 : ''}}</td>
                        <td>{{isset($user->detail->mobil_2) ? $user->detail->mobil_2 : ''}}</td>
                        <td><span class="label label-{{$user->is_active==1 ? 'success' : 'warning'}}">{{$user->is_active==1 ? 'AKTİV' : 'PASSİV'}}</span></td>
                        <td>{{$user->user_updated_at()}}</td>
                        <td class="text-center">

                            <a  style="color:red;" onclick='checkDeleteConfrim("{{route('admin.user.destroy',$user->id)}}")'><i class="icon-database-remove"></i>  </a>
                            <a class="ml-20" href="{{route('admin.user.edit',$user->id)}}"> <i class="icon-database-edit2"></i> </a>

                        </td>
                        <td></td>
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


        }
    </script>

@endsection

