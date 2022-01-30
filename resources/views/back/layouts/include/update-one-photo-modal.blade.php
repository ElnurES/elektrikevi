<div id="info_300" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Şəkil yeniləmə formu</h5>
            </div>

            <div class="modal-body">
                <form action="{{route('admin.product.update-one-photo')}}" class="form-horizontal" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Şəkil:</label>
                        <div class="col-lg-9">
                            <input type="file" name="photos[]" multiple class="file-styled" >
                            <span class="help-block">Qəbul edilən uzantılar: gif, png, jpg, jpeg. Maksimum həcm 2Mb olmalıdır.</span>
                        </div>
                    </div>

                    <input type="hidden" name="slug" id="productSlug">
                    <input type="hidden" name="id" id="photoId" >

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Yenilə <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-link btn-xs text-uppercase text-semibold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>