@extends('master')
@section('content')

<div class="space50">&nbsp;</div>
<div class="container beta-relative">
    <div class="pull-left">
        <h2>Add product</h2>
    </div>
    <div class="space50">&nbsp;</div>
    @include('error')
    <div class="container">
        <form action="admin-edit" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for='editName'>ID</label>
                <input type="number" class="form-control" name="editId" value="{{$product->id}}" readonly>
            </div>

            <div class="form-group">
                <label for='editName'>Name</label>
                <input type="text" class="form-control" name="editName" id="editName" placeholder="Enter name" value="{{$product->name}}" required>
            </div>

            <div class="form-group">
                <label for='editPrice'>Price</label>
                <input type="number" min=10000 class="form-control" name="editPrice" id="editPrice" placeholder="Enter price" value="{{$product->unit_price}}" required>
            </div>

            <div class="form-group">
                <label for='editPromotionPrice'>Promotion Price</label>
                <input type="number" min=10000 class="form-control" name="editPromotionPrice" id="editPromotionPrice" value="{{$product->promotion_price}}" placeholder="Enter promotion price">
            </div>

            <div class="form-group">
                <label for='editUnit'>Unit</label>
                <input type="text" class="form-control" name="editUnit" id="editUnit" value="{{$product->unit}}" placeholder="Enter unit" required>
            </div>

            <div class="form-group">
                <label for='editNew'>New</label>
                <input type="number" min=0 class="form-control" name="editNew" id="editNew" value="{{$product->new}}" placeholder="Enter new" required>
            </div>

            <div class="form-group">
                <label for='editType'>Type</label>
                <input type="text" class="form-control" name="editType" id="editType" value="{{$product->id_type}}" placeholder="Enter type" required>
            </div>

            <div class="form-group">
                <label for='editImage'>Image file</label>
                <input type="file" class="form-control-file" name="editImage" id="editImage">
            </div>

            <div class="form-group">
                <img id="preview-image-before-upload" src="source/image/product/{{$product->image}}" alt="preview image" style="max-height: 250px;">
                <script type="text/javascript">
                    $(document).ready(function(e) {
                        $('#inputImage').change(function() {
                            let reader = new FileReader();
                            reader.onload = (e) => {
                                $('#preview-image-before-upload').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(this.files[0]);
                        });
                    });
                </script>
            </div>

            <div class="form-group">
                <label for='editDescription'>Description</label>
                <textarea name="editDescription" required>{{$product->description}}</textarea>
                <script>
                    CKEDITOR.replace('editDescription');
                </script>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="space50">&nbsp;</div>
</div>

@endsection