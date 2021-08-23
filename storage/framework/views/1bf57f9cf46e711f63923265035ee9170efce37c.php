<?php $__env->startSection('content'); ?>


<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <br>

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <div class="row">

            <div class="col-lg-12">

                <div class="kt-portlet">

                    <div class="kt-portlet__head">

                        <div class="kt-portlet__head-label">

                            <h3 class="kt-portlet__head-title">

                                 <?php echo e($title); ?>


                            </h3>

                        </div>

                    </div>

                    <form class="kt-form kt-form--label-right add_form" method="post" action="<?php echo e($url); ?>">

                        <?php echo csrf_field(); ?>
                        <?php
                            
                        if(isset($type)){
                            $index= route('admin.'.$resourcePath.'.index',array('type'=>$type));
                            $store=route('admin.'.$resourcePath.'.store',array('type'=>$type));
                        }else {
                            $index= route('admin.'.$resourcePath.'.index');
                            $store=route('admin.'.$resourcePath.'.store');
                        }
                        // echo $index;
                        // exit;
                        ?>
                        <?php echo $__env->make('adminseller.'.$resourcePath.'.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="kt-portlet__foot">

                            <div class="kt-form__actions">

                                <div class="row">

                                    <div class="col-lg-4"></div>

                                    <div class="col-lg-8">

                                        <button type="button" class="btn btn-primary submit change_button">Submit<i class="la la-spinner change_spin d-none"></i></button>

                                        <a href="<?php echo e($index); ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>



<script>

    $(document).ready(function() {

        $(".submit").on("click", function(e) {
          	
            e.preventDefault();

            if ($(".add_form").valid()) {
            	
            	$('.change_button').find('.change_spin').removeClass('d-none');
            	$('.change_button').prop('disabled', true);

                $.ajax({

                    type: "POST",

                    url: "<?php echo e($store); ?>",

                    data: new FormData($('.add_form')[0]),

                    processData: false,

                    contentType: false,

                    success: function(data) {

                        if (data.status === 'success') {
                        	console.log('done');
                            window.location = "<?php echo e($index); ?>";

                            toastr["success"]("<?php echo e($module); ?> Added Successfully", "Success");

                            

                        } else if (data.status === 'error') {
                            location.reload();

                            toastr["error"]("Something went wrong", "Error");

                        }

                    },
                    error :function( data ) {
                        console.log(data.status)
                        if(data.status === 422) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors.errors, function (key, value) {
                                console.log(key+ " " +value);
                                $('#'+key).addClass('is-invalid');
                                 $('#'+key).parent().append('<div id="'+key+'-error" class="error invalid-feedback ">'+value+'</div>');
                            });
                                
                            }

                    }

                });

            } else {
            	$('.change_button').prop('disabled', false);
            	$('.change_button').find('.change_spin').addClass('d-none');
                e.preventDefault();

            }

        });

    });
    
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel training\crazy_world\resources\views/admin/general/add_form.blade.php ENDPATH**/ ?>