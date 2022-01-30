@if(Cart::count()>0)
    <div class="cart-items-wrapper ps-scroll">
        @foreach(Cart::content() as $cart)
            <div class="single-cart-item">
                <a  href="{{route('removeFromCartByRowId',$cart->rowId)}}" class="remove-icon"><i class="ion-android-close"></i></a>
                <div class="image">
                    <a href="{{route('product.detail',$cart->options->slug)}}">
                        <img src="{{asset("uploads/product").'/'.$cart->options->photo}}" class="img-fluid" alt="{{$cart->options->photo}}">
                    </a>
                </div>
                <div class="content">
                    <p class="product-title"><a href="{{route('product.detail',$cart->options->slug)}}">{{$cart->name}}</a></p>
                    <p class="count"><span>{{$cart->qty}} x </span>{{$cart->price}} ⫙</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="cart-calculation">
        <table class="table">
            <tbody>
            <tr>
                <td class="text-left">Cəmi :</td>
                <td class="text-right">{{Cart::subtotal()}} ⫙</td>
            </tr>
            <tr>
                <td class="text-left">ƏDV (0%) :</td>
                <td class="text-right">{{Cart::tax()}} ⫙</td>
            </tr>
            <tr>
                <td class="text-left">Cəmi(Ədv ilə) :</td>
                <td class="text-right">{{Cart::total()}} ⫙</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="cart-buttons">
        <a href="{{route('cart')}}">Səbət</a>
        <a href="{{route('checkout')}}">Sİfarİşİ rəsmİləşdİr</a>
    </div>
    @else
    <div class="alert alert-info" role="alert">
        Səbətiniz boşdur!
    </div>
@endif