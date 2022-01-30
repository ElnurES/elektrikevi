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
                <a href="{{route('admin.order')}}"><span class="label label-success">SİFARİŞLƏR</span></a>
            </div>
        </div>

        <table class="table datatable-responsive-row-control">
            <thead>
            <tr>
                <th></th>
                <th>Şəkil</th>
                <th>Ad</th>
                <th>Slug</th>
                <th>Məhsul Kodu</th>
                <th>Qiymət</th>
                <th>Stok Miqdarı</th>
                <th>Status</th>
                <th>Domain</th>
                <th>Yenilənmə Tarixi</th>
            </tr>
            </thead>
            <tbody>
            @if($products->count()>0)
                @foreach($products as $key)
                    <tr>
                        <td></td>
                        <td>
                            <a href="{{route('admin.product.edit',$key->product->slug)}}">
                                @if(isset($key->product->parentPhoto()->photo))
                                    <img style="width: 50px;" src="{{asset("uploads/product").'/'.$key->product->parentPhoto()->photo}}"  alt="">
                                @else
                                    <img style="width: 50px;" src="{{asset("uploads/product/placeholder.jpg")}}"  alt="">
                                @endif
                            </a>
                        </td>
                        <td><a href="{{route('admin.product.edit',$key->product->slug)}}">{{$key->product->name}}</a></td>
                        <td><a href="{{route('admin.product.edit',$key->product->slug)}}">{{$key->product->slug}}</a></td>
                        <td><a href="{{route('admin.product.edit',$key->product->slug)}}">{{$key->product->code}}</a></td>
                        <td><a href="{{route('admin.product.edit',$key->product->slug)}}">{!!($key->product->discount==1) ? "<strike>".$key->product->price."</strike> ".$key->product->discount_price."" : "".$key->product->price.""!!}</a></td>
                        <td><a href="{{route('admin.product.edit',$key->product->slug)}}">{{$key->product->stock_count}}</a></td>
                        <td><span class="label label-info">{{$key->product->status->name}}</span></td>
                        <td><span class="label label-success">{{$key->product->productDomain->name}}</span></td>
                        <td>{{$key->product->product_updated_at_no_pm()}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection


