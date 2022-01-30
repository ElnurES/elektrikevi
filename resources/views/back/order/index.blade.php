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
            </div>
        </div>

        <table class="table datatable-responsive-row-control">
            <thead>
            <tr>
                <th></th>
                <th>Sifarişçi</th>
                <th>Email</th>
                <th>Mobil</th>
                <th>Şəhər</th>
                <th>Rayon</th>
                <th>Küçə</th>
                <th>Poçt İndeksi</th>
                <th>Ünvan</th>
                <th>Bank</th>
                <th>Tutar(ƏDV ilə)</th>
                <th>Tutar(ƏDV siz)</th>
                <th>ƏDV Miqdarı</th>
                <th>Status</th>
                <th>Sifariş Tarixi
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if($orders->count()>0)
                @foreach($orders as $order)
                    <tr>
                        <td></td>
                        <td><a href="mailto:{{$order->email}}">{{$order->fullname}}</a></td>
                        <td><a href="mailto:{{$order->email}}">{{$order->email}}</a></td>
                        <td><a href="tel:{{$order->mobil}}">{{$order->mobil}}</a></td>
                        <td>{{$order->city->name}}</td>
                        <td>{{$order->region->name}}</td>
                        <td>{{$order->street->name}}</td>
                        <td>{{$order->zip_code}}</td>
                        <td>{{$order->adress}}</td>
                        <td>{{$order->bank}}</td>
                        <td>{{$order->order_total}}</td>
                        <td>{{$order->sub_total}}</td>
                        <td>{{$order->edv_total}}</td>
                        <td>
                            <select  class="form-control">
                                @if($status->count()>0)
                                    @foreach($status as $key)
                                        <option value="{{$key->id}}" {{$order->status_id==$key->id ? 'selected' : ''}}>{{$key->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </td>
                        <td>{{$order->order_created_at_no_pm()}}</td>
                        <td>
                            <a class="label label-info" href="{{route('admin.order.show',$order->basket_id)}}"> <i class="icon-basket"></i> Məhsulları</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection


