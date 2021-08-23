
<?php if($image): ?>
    <a target="_blank"  href="<?php echo e(url('storage/uploads/'. $folder_name.'/'.$image)); ?>" rel="gallery" class="fancybox" title="">
        <img src="<?php echo e(url('storage/uploads/'. $folder_name.'/Tiny/'.$image)); ?>" width="50px" class="img-thumbnail" alt="<?php echo e($image); ?>" />
    </a>
<?php else: ?>
<a>-</a>
<?php endif; ?><?php /**PATH D:\Laravel training\crazy_world\resources\views/admin/layout/image.blade.php ENDPATH**/ ?>