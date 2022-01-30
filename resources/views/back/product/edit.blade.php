@extends('back.layouts.master')
@section('title',$title)
@section('head')

    <script type="text/javascript" src="/back/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/pages/form_layouts.js"></script>

    <script type="text/javascript" src="/back/assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/pickers/anytime.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/pickers/pickadate/legacy.js"></script>

    <script type="text/javascript" src="/back/assets/js/pages/picker_date.js"></script>

    <style>
        .interestNone {
            display: none;
        }
        .discountNone {
            display: none;
        }
        .discountBlock {
            display: block;
        }

        .interestBlock {
            display: block;
        }

        .interestBlock {
            display: block;
        }
        .featureBlock {
            display: inline-block;
        }
    </style>
@endsection
@section('page-header')
    @include('back.layouts.include.page-header',compact('crumbs'))
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
        @include('back.layouts.include.alert-messages')
        <!-- Basic layout-->
            <form action="{{route('admin.product.update',$product->slug)}}" class="form-horizontal" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">{{$title}}</h5>
                        <div class="heading-elements">
                            <a href="{{route('admin.product')}}"><span class="label label-success">MƏHSUL LİSTİ</span></a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ad:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="name" value="{{old('name',$product->name)}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Üst Kateqoriya:</label>
                            <div class="col-lg-9">
                                <select class="select" name="parent_id" onchange="parentCategory(this.value)" id="parentId">
                                    <option value="0">Üst Kateqoriyanı Seçin</option>
                                    @if($cateqories->count()>0)
                                        @foreach($cateqories as $category)
                                            <option value="{{$category->id}}" {{in_array($category->id,$categoryItem) ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Alt Kateqoriya:</label>
                            <div class="col-lg-9">
                                <select class="select" name="child_id[]" disabled  id="childId" multiple>
                                    <option>Alt Kateqoriyanı Seçin</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group" >
                            <label class="col-lg-3 control-label">Qiymət:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" onblur="checkTrueNumber(this.value)" name="price" value="{{old('price',$product->price)}}">
                                <span class="help-block">Qəbul edilən format: 5(0 dan başqa) və ya 5.4 şəklindədir.</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Endirim:</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="discount"  onchange="discountPrice(this.value)">
                                    <option value="1" {{$product->discount==1 ? 'selected' : ''}}>Var!</option>
                                    <option value="0" {{$product->discount==0 ? 'selected' : ''}}>Yoxdur!</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group {{$product->discount==1 ? 'discountBlock' : 'discountNone'}}" id="discountDate">
                            <label class="col-lg-3 control-label">Endirim Müddəti:</label>
                            <div class="col-lg-9">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-icon" id="ButtonCreationDemoButton"><i class="icon-calendar3"></i></button>
                                </span>
                                <input type="text" class="form-control" name="discount_date" value="{{$product->discount_date}}" id="ButtonCreationDemoInput">
                            </div>
                        </div>

                        <div class="form-group {{$product->discount==1 ? 'interestBlock' : 'interestNone'}}" id="interestDiv">
                            <label class="col-lg-3 control-label">Neçə Faiz:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" onblur="checkTrueNumber(this.value)" name="interest" value="{{old('interest',$product->interest)}}">
                                <span class="help-block">Qəbul edilən format: 5(0 dan başqa) və ya 5.4 şəklindədir.</span>
                            </div>
                        </div>

                        <div class="form-group" >
                            <label class="col-lg-3 control-label">Stok Miqdarı:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" onblur="checkTrueNumberExceptFloat(this.value)" name="stock_count" value="{{old('stock_count',$product->stock_count)}}">
                                <span class="help-block">Qəbul edilən format: yalnız rəqəm olmalıdır(0 dan böyük)!.</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Məhsul Haqqında:</label>
                            <div class="col-lg-9">
                                <textarea rows="5" cols="5" name="description" class="form-control" >{{old('description',$product->description)}}</textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group" id="featureId">
                            <label class="col-lg-3 control-label">Məhsul Özəllikləri:</label>
                            <div class="col-lg-9">
                                <span class="input-group-btn">
                                    <button class="btn bg-teal col-lg-4" type="button" onclick="addFeature()">Əlavə Et</button>
                                    <button class="btn bg-danger col-lg-4 offset-lg-1"  id="removeFeatureId" type="button" onclick="removeFeature(this)">Sil</button>
                                </span>
                            </div>
                            @if($product->feature->count()>0)
                                @foreach($product->feature as $feature)
                                    <div class="col-lg-3 mt-20 divConut countClass" ></div>
                                    <div class="col-lg-4 mt-20 titleClass">
                                        <input type="text" class="form-control" placeholder="Adı" value="{{$feature->title}}" name="title[]">
                                    </div>
                                    <div class="col-lg-5 mt-20 contentClass" >
                                        <input type="text" class="form-control" placeholder="Dəyəri" value="{{$feature->content}}" name="content[]">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <hr>

                        <div class="row">
                            @foreach($product->photo as $key)
                                <div class="col-md-3">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a class="label label-warning" style="color: white;" data-action="collapse"> </a></li>
                                                    <li>
                                                        @if($key->parent==1)
                                                            <a class="parentPhoto" data-id="{{$key->id}}" data-slug="{{$product->slug}}" data-type="from" onclick="changeParentPhoto(this)"><span class="label label-primary">Üst - </span> </a>
                                                        @endif

                                                        @if($key->parent==0)
                                                            <a class="parentPhoto" data-id="{{$key->id}}" data-slug="{{$product->slug}}" data-type="to" onclick="changeParentPhoto(this)"><span class="label label-primary">Üst + </span> </a>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        @if($key->child==1)
                                                            <a class="childPhoto" data-id="{{$key->id}}" data-slug="{{$product->slug}}" data-type="from" onclick="changeChildPhoto(this)"><span class="label label-info">Alt - </span> </a>
                                                        @endif

                                                        @if($key->child==0)
                                                           <a class="childPhoto" data-id="{{$key->id}}" data-slug="{{$product->slug}}" data-type="to" onclick="changeChildPhoto(this)"><span class="label label-info">Alt + </span> </a>
                                                        @endif
                                                    </li>
                                                    <li><a data-toggle="modal" data-target="#info_300"> <span class="label label-success" id="changeOnePhoto" data-id="{{$key->id}}" data-slug="{{$product->slug}}">DƏYİŞDİR</span> </a></li>
                                                    <li><a href="{{route('admin.product.removeOnePhoto',[$key->id,$product->slug])}}"><span class="label label-danger">Sİl</span> </a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="thumbnail">
                                                <a href="/back/assets/images/placeholder.jpg" data-popup="lightbox">
                                                    <img src="{{asset('uploads/product').'/'.$key->photo}}" alt="" >
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Şəkil:</label>
                            <div class="col-lg-9">
                                <input type="file" name="photos[]" multiple id="productPhoto" class="file-styled" >
                                <span class="help-block">Qəbul edilən uzantılar: gif, png, jpg, jpeg. Maksimum həcm 2Mb olmalıdır.</span>
                            </div>
                        </div>


                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Yenilə <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /basic layout -->
        </div>

    </div>

    <!-- Info 300 -->
    @include('back.layouts.include.update-one-photo-modal')
    <!-- /info 300 -->
@endsection

@section('foot')
    <script>
        function removeFeature(removeElement) {
            var contentClass,countClass,titleClass;
            contentClass=document.getElementsByClassName("contentClass");
            countClass=document.getElementsByClassName("countClass");
            titleClass=document.getElementsByClassName("titleClass");
            var i = countClass.length-1;

            if(i>=0) {
                contentClass[i].remove();
                countClass[i].remove();
                titleClass[i].remove();
                console.log(i)

                if(i==0) {
                    removeElement.classList.remove("featureBlock");
                    removeElement.classList.add("featureNone");

                }
            }
        }
    </script>

    <script>
        function addFeature() {
            var removeFeatureId,featureId,divElement,divElement1,divElementInput1,divElement2,divElementInput2;

            removeFeatureId=document.getElementById('removeFeatureId');
            featureId=document.getElementById('featureId');
            removeFeatureId.classList.remove("featureNone");
            removeFeatureId.classList.add("featureBlock");

            divElement = document.createElement("div");
            divElement.setAttribute('class', 'col-lg-3 mt-20 divConut countClass');

            divElement1 = document.createElement("div");
            divElement1.setAttribute('class', 'col-lg-4 mt-20 titleClass');
            divElementInput1=document.createElement("input");
            divElementInput1.setAttribute('class', 'form-control');
            divElementInput1.setAttribute('type', 'text');
            divElementInput1.setAttribute('name', 'title[]');
            divElementInput1.setAttribute('placeholder', 'Adı');
            divElement1.append(divElementInput1);

            divElement2 = document.createElement("div");
            divElement2.setAttribute('class', 'col-lg-5 mt-20 contentClass');
            divElementInput2=document.createElement("input");
            divElementInput2.setAttribute('class', 'form-control');
            divElementInput2.setAttribute('type', 'text');
            divElementInput2.setAttribute('name', 'content[]');
            divElementInput2.setAttribute('placeholder', 'Dəyəri');
            divElement2.append(divElementInput2);

            featureId.append(divElement);
            featureId.append(divElement1);
            featureId.append(divElement2);

        }
    </script>

    <script>
        function changeParentPhoto(tag) {
            var id,slug,type,url,parentPhotos,i;
            id=tag.dataset.id;
            slug=tag.dataset.slug;
            type=tag.dataset.type;
            parentPhotos=document.getElementsByClassName('parentPhoto');

            if(type=='to') {
                url="{{route('admin.product.addParentPhoto')}}";
                $.ajax({
                    url:url,
                    data:{"_token": "{{ csrf_token() }}",id:id,slug:slug,type:type},
                    type:'POST',
                    success:function (response) {
                        for (i=0;i<parentPhotos.length;i++) {
                            parentPhotos[i].firstChild.innerHTML='Üst +';
                            parentPhotos[i].setAttribute("data-type", "to");
                        }
                        tag.firstChild.innerHTML='Üst -';
                        tag.setAttribute("data-type", "from");

                    }
                });
            }

            if(type=='from') {
                url="{{route('admin.product.removeParentPhoto')}}";
                $.ajax({
                    url:url,
                    data:{"_token": "{{ csrf_token() }}",id:id,slug:slug,type:type},
                    type:'POST',
                    success:function (response) {
                        tag.firstChild.innerHTML='Üst +';
                        tag.setAttribute("data-type", "to");

                    }
                });
            }

        }
    </script>

    <script>
        function changeChildPhoto(tag) {
            var id,slug,type,url,parentPhotos,i;
            id=tag.dataset.id;
            slug=tag.dataset.slug;
            type=tag.dataset.type;
            parentPhotos=document.getElementsByClassName('childPhoto');

            if(type=='to') {
                url="{{route('admin.product.addСhildPhoto')}}";
                $.ajax({
                    url:url,
                    data:{"_token": "{{ csrf_token() }}",id:id,slug:slug,type:type},
                    type:'POST',
                    success:function (response) {
                        for (i=0;i<parentPhotos.length;i++) {
                            parentPhotos[i].firstChild.innerHTML='Alt +';
                            parentPhotos[i].setAttribute("data-type", "to");
                        }
                        tag.firstChild.innerHTML='Alt -';
                        tag.setAttribute("data-type", "from");

                    }
                });
            }

            if(type=='from') {
                url="{{route('admin.product.removeСhildPhoto')}}";
                $.ajax({
                    url:url,
                    data:{"_token": "{{ csrf_token() }}",id:id,slug:slug,type:type},
                    type:'POST',
                    success:function (response) {
                        tag.firstChild.innerHTML='Alt +';
                        tag.setAttribute("data-type", "to");

                    }
                });
            }

        }
    </script>

    <script>
        var changeOnePhoto,id,slug;
        changeOnePhoto=document.getElementById('changeOnePhoto');
        id=changeOnePhoto.dataset.id;
        slug=changeOnePhoto.dataset.slug;
        document.getElementById('productSlug').value=slug;
        document.getElementById('photoId').value=id;

    </script>

    <script>
        function isPositiveFloat(s) {
            return !isNaN(s) && Number(s) > 0;
        }

        function isPositiveNumber(s) {
            if (s!='' && Number.isInteger(+s) && s>0) {
                return true;
            } else {
                return false;
            }

        }

        function discountPrice(val) {
            var interestDiv=document.getElementById('interestDiv');
            var discountDate=document.getElementById('discountDate');
            if(val==1) {
                interestDiv.classList.remove("interestNone");
                interestDiv.classList.add("interestBlock");

                discountDate.classList.remove("discountNone");
                discountDate.classList.add("discountBlock");
            }

            if(val==0) {
                interestDiv.classList.add("interestNone");
                interestDiv.classList.remove("interestBlock");

                discountDate.classList.add("discountNone");
                discountDate.classList.remove("discountBlock");
            }
        }
    </script>

    <script>
        function checkTrueNumber(val) {
            if(!isPositiveFloat(val)) {
                document.getElementsByName('interest')[0].value='';
                document.getElementsByName('price')[0].value='';
                swal({
                    title: "Məzmun düzgün deyil!",
                    text: "Rəqəm və ya kəsr ədəd daxil edin.",
                    icon: "warning",
                    button: "Ok",
                });
            }
        }
    </script>

    <script>
        function checkTrueNumberExceptFloat(val) {
            if(isPositiveNumber(val)==false) {
                document.getElementsByName('stock_count')[0].value='';
                swal({
                    title: "Məzmun düzgün deyil!",
                    text: "Yalnız rəqəm daxil edin(0 dan böyük).",
                    icon: "warning",
                    button: "Ok",
                });
            }
        }
    </script>

    <script>
        var parentId,val,categoryItem,categoryItemCount;
        parentId=document.getElementById('parentId');
        val=parentId.value;
        categoryItemCount="{{count($categoryItem)}}";
        categoryItem="{{json_encode($categoryItem)}}";
        if(val!=0 && categoryItemCount>1) {
            var url="{{route('admin.product.getChildCategoryWithSelected')}}";
            $.ajax({
                url:url,
                data:{"_token": "{{ csrf_token() }}",val:val,item:categoryItem},
                type:'POST',
                success:function (response) {
                    document.getElementById('childId').disabled=false;
                    $('#childId').html(response);

                }
            });
        }

    </script>
    <script>
        function parentCategory(parentId) {
            if(parentId!=0) {
                var url="{{route('admin.product.getChildCategory')}}";
                $.ajax({
                    url:url,
                    data:{"_token": "{{ csrf_token() }}",parentId:parentId},
                    type:'POST',
                    success:function (response) {
                        document.getElementById('childId').disabled=false;
                        $('#childId').html(response);

                    }
                });

            }
        }
    </script>
@endsection