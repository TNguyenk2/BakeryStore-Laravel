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
        <form action="admin-add-form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for='inputName'>Name</label>
                <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Enter name" required>
            </div>

            <div class="form-group">
                <label for='inputPrice'>Price</label>
                <input type="number" min=10000 class="form-control" name="inputPrice" id="inputPrice" placeholder="Enter price" required>
            </div>

            <div class="form-group">
                <label for='inputPromotionPrice'>Promotion Price</label>
                <input type="number" min=10000 class="form-control" name="inputPromotionPrice" id="inputPromotionPrice" placeholder="Enter promotion price">
            </div>

            <div class="form-group">
                <label for='inputUnit'>Unit</label>
                <input type="text" class="form-control" name="inputUnit" id="inputUnit" placeholder="Enter unit" required>
            </div>

            <div class="form-group">
                <label for='inputNew'>New</label>
                <input type="number" min=0 class="form-control" name="inputNew" id="inputNew" placeholder="Enter new" required>
            </div>

            <div class="form-group">
                <label for='inputType'>Type</label>
                <input type="text" class="form-control" name="inputType" id="inputType" placeholder="Enter type" required>
            </div>

            <div class="form-group">
                <label for='inputImage'>Image file</label>
                <input type="file" class="form-control-file" name="inputImage" id="inputImage" required>
            </div>

            <div class="form-group">
                <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" alt="preview image" style="max-height: 250px;">
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
                <label for='inputDescription'>Description</label>
                <textarea name="inputDescription" required></textarea>
                <script>
                    CKEDITOR.replace('inputDescription');
                </script>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="space50">&nbsp;</div>
</div>

@endsection