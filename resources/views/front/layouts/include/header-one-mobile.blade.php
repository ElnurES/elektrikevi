<li class="menu-item-has-children"><a href="{{route('catalog')}}">Məhsullar</a>
    @if(count($categories['categories']) >0)
        <ul class="sub-menu">

            @foreach($categories['categories'] as $category)
                <li class="menu-item-has-children"><a href="{{route('category',$category->slug)}}">{{$category->name}}</a>
                    @if($category->child()->count()>0)
                        <ul class="sub-menu">

                            @foreach($category->child as $childCategory)
                                <li><a href="{{route('category',[$category->slug,$childCategory->slug])}}">{{$childCategory->name}}</a></li>
                            @endforeach

                        </ul>
                    @endif
                </li>
            @endforeach

        </ul>
    @endif
</li>
{{--<li><a href="{{route('catalog')}}">Kataloq</a></li>--}}