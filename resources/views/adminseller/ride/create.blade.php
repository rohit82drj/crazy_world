<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-4">
            <label>Name:</label>
            <input type="text" class="form-control" placeholder="Enter name" name="name" required>
        </div>
        <div class="col-lg-4">
            <label>Image:</label>
            <input type="file" class="form-control" name="image" required>
        </div>
        <div class="col-lg-8">
            <label>Description:</label>
            <textarea class="form-control" placeholder="Enter Description" name="description"></textarea>
        </div>
         <div class="col-lg-8">
            <label> Price
                <span class="text-danger"></span></label>
                <input type="text" class="form-control numbersOnly" name="price" placeholder="Price" onkeypress="return isNumber(event)"/>

                                        <!--end::Input-->
                                         @foreach($errors->get('price') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                  @endforeach
                 <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>
   
    @include('admin.layout.status_checkbox',array('data' => ""))
</div>
<script>		
    $(document).ready(function()
    {
        $('#is_image').click(function() 
        {
            $('#image_tab').css('display','block');
            $('#videolink_tab').css('display','none');
        });
        $('#is_videolink').click(function() 
        {
            $('#image_tab').css('display','none');
            $('#videolink_tab').css('display','block');
        });
    });
</script>
 <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
   </script>