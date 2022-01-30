<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="{{route('admin')}}" class="media-left">
                        <img src="/back/assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                    </a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{auth()->guard('admin')->user()->fullname}}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <li><a href="{{route('admin')}}"><i class="fa fa-home"></i> <span>Əsas Səhifə</span></a></li>
                    <li><a href="{{route('admin.category')}}"><i class="fa fa-bars"></i> <span>Kategoriya</span></a></li>
                    <li><a href="{{route('admin.product')}}"><i class="fa fa-shopping-basket"></i> <span>Məhsul</span></a></li>
                    <li><a href="{{route('admin.order')}}"><i class="fa fa-shopping-cart"></i> <span>Sifariş</span></a></li>
                    <li><a href="{{route('admin.user')}}"><i class="fa fa-users"></i> <span>İstifadəçilər</span></a></li>
                    <li><a href="{{route('admin.config')}}"><i class="fa fa-cogs"></i> <span>Parametrlər</span></a></li>
                    <li><a href="{{route('admin.contact')}}"><i class="fa fa-phone-square"></i> <span>Əlaqə</span></a></li>
                    <li><a href="{{route('admin.subscribe')}}"><i class="fa fa-user-plus"></i> <span>Abunələr</span></a></li>
                    <li><a href="{{route('clear.cache')}}"><i class="icon-spinner2 spinner"></i> <span>Keşi Təmizlə</span></a></li>
                    <li><a href="{{route('admin.logout')}}"><i class="icon-switch2"></i> Çıxış</a></li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>