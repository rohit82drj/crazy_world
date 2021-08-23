@php
$edit = $data['edit'];
@endphp
<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-4">
            <label>Name:</label>
            <input type="text" class="form-control" value="{{$edit->name}}" placeholder="Enter name" name="name" required>
        </div>
         <div class="col-lg-4">
            <label>Image:</label>
            <input type="file" class="form-control" value="{{$edit->image}}" name="image" required>
            @if($edit->image)
                <div class="image_layer">
                    <div class="image_div">
                        <a target="_blank"  href="{{ url('storage/uploads/page/'.$edit->image) }}" rel="gallery" class="fancybox" title="">
                            <img src="{{ url('storage/uploads/page/Tiny/'.$edit->image) }}" class="img-thumbnail" alt="{{ $edit->image }}" />
                        </a>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-lg-8">
             <label>Description:</label>
            <textarea class="form-control" value="{{$edit->description}}" placeholder="Enter Description" name="description">{{$edit->description}}</textarea>
        </div>
         <div class="col-lg-8">
             <label> Price
            <span class="text-danger"></span></label>
            <input type="text" class="form-control numbersOnly" name="price" value="{{$edit->price}}" placeholder="Price" onkeypress="return isNumber(event)"/>

                                    <!--end::Input-->
                                     @foreach($errors->get('price') as $error)
                                <span class="help-block">{{ $error }}</span>
                              @endforeach
             <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>
    
    @include('admin.layout.status_checkbox',array('data' => $edit->status))
    <input type="hidden" id="hidden_data" value="{{$edit->is_check}}">
</div>
<script>		
    $(document).ready(function()
    {
        var v1 = $('#hidden_data').val();
        if(v1 ==1)
        {
            $('#image_tab').css('display','none');
            $('#videolink_tab').css('display','block');
            $('#img_dispaly').css('display','none');
        } else if(v1 == 0)
        {
            $('#image_tab').css('display','block');
            $('#videolink_tab').css('display','none');
            $('#img_dispaly').css('display','block');
        }
        $('#is_image').click(function() 
        {
            $('#image_tab').css('display','block');
            $('#videolink_tab').css('display','none');
            $('#img_dispaly').css('display','block');
        });
        $('#is_videolink').click(function() 
        {
            $('#image_tab').css('display','none');
            $('#videolink_tab').css('display','block');
            $('#img_dispaly').css('display','none');
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