<?php
$edit = $data['edit'];
?>
<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-4">
            <label>Name:</label>
            <input type="text" class="form-control" value="<?php echo e($edit->name); ?>" placeholder="Enter name" name="name" required>
        </div>
         <div class="col-lg-4">
            <label>Image:</label>
            <input type="file" class="form-control" value="<?php echo e($edit->image); ?>" name="image" required>
            <?php if($edit->image): ?>
                <div class="image_layer">
                    <div class="image_div">
                        <a target="_blank"  href="<?php echo e(url('storage/uploads/page/'.$edit->image)); ?>" rel="gallery" class="fancybox" title="">
                            <img src="<?php echo e(url('storage/uploads/page/Tiny/'.$edit->image)); ?>" class="img-thumbnail" alt="<?php echo e($edit->image); ?>" />
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-lg-8">
             <label>Description:</label>
            <textarea class="form-control" value="<?php echo e($edit->description); ?>" placeholder="Enter Description" name="description"><?php echo e($edit->description); ?></textarea>
        </div>
         <div class="col-lg-8">
             <label> Price
            <span class="text-danger"></span></label>
            <input type="text" class="form-control numbersOnly" name="price" value="<?php echo e($edit->price); ?>" placeholder="Price" onkeypress="return isNumber(event)"/>

                                    <!--end::Input-->
                                     <?php $__currentLoopData = $errors->get('price'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="help-block"><?php echo e($error); ?></span>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>
    
    <?php echo $__env->make('admin.layout.status_checkbox',array('data' => $edit->status), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <input type="hidden" id="hidden_data" value="<?php echo e($edit->is_check); ?>">
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
   </script><?php /**PATH D:\Laravel training\crazy_world\resources\views/adminseller/ride/edit.blade.php ENDPATH**/ ?>