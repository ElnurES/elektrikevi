@if($star>=1)
    <i class="ion-android-star-outline star active" data-star="1" data-product="{{$product_id}}"></i>
@else
    <i class="ion-android-star-outline star" data-star="1" data-product="{{$product_id}}"></i>
@endif
@if($star>=2)
    <i class="ion-android-star-outline star active" data-star="2" data-product="{{$product_id}}"></i>
@else
    <i class="ion-android-star-outline star" data-star="2" data-product="{{$product_id}}"></i>
@endif
@if($star>=3)
    <i class="ion-android-star-outline star active" data-star="3" data-product="{{$product_id}}"></i>
@else
    <i class="ion-android-star-outline star" data-star="3" data-product="{{$product_id}}"></i>
@endif
@if($star>=4)
    <i class="ion-android-star-outline star active" data-star="4" data-product="{{$product_id}}"></i>
@else
    <i class="ion-android-star-outline star" data-star="4" data-product="{{$product_id}}"></i>
@endif
@if($star==5)
    <i class="ion-android-star-outline star active" data-star="5" data-product="{{$product_id}}"></i>
@else
    <i class="ion-android-star-outline star" data-star="5" data-product="{{$product_id}}"></i>
@endif