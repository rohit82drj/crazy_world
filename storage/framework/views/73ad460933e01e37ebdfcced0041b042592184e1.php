<?php $__env->startSection('content'); ?>

<link href="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.css')); ?>" rel="stylesheet" type="text/css" />



<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

	<br>



	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

		<div class="kt-portlet kt-portlet--mobile">

			<div class="kt-portlet__head kt-portlet__head--lg">

				<div class="kt-portlet__head-label">

					<span class="kt-portlet__head-icon">

						<i class="kt-font-brand flaticon2-line-chart"></i>

					</span>

					<h3 class="kt-portlet__head-title">

						Customer list

					</h3>

				</div>

				<div class="kt-portlet__head-toolbar">

					<div class="kt-portlet__head-wrapper">

						<div class="kt-portlet__head-actions">

							<a href="<?php echo e(route('admin.'.$resourcePath.'.create')); ?>" class="btn btn-brand btn-elevate btn-icon-sm">

								<i class="la la-plus"></i>

								Add Customer

							</a>

						</div>

					</div>

				</div>

			</div>

			<div class="kt-portlet__body">

				<div id="kt_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4">

					<table class="table table-striped- table-bordered table-hover table-checkable datatable" id="datatable_rows">

						<?php echo csrf_field(); ?>

						<thead>

							<tr>


								<th>First Name</th>
								<th>Last Name</th>
								<th>Email Id</th>
								<th>Contact No</th>
								<th>Is Active</th>
								<th>Action</th>
								<th>Add Money</th>


							</tr>

						</thead>

						<tbody>

						</tbody>

					</table>

				</div>

			</div>

			


		</div>

	</div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>


<?php if(Auth::user()->id == 1): ?>
	
	<br>
	<?php endif; ?>
</div> 



<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			
			<div class="modal-body">
				 <form class="kt-form kt-form--label-right add_form" method="post" >
                    <?php echo csrf_field(); ?>
					
					<div class="form-group row">
						<div class="col-lg-6">
							<label for="recipient-name" class="form-control-label">Amount:</label>
							<input type="text" class="form-control" name="price" onkeyup="if(/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
						</div>					
						
					</div>
					<div class="form-group">
						<label for="message-text" class="form-control-label">Remark:</label>
						<textarea class="form-control" id="message-text"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary submit change_button">Add Order<i class="la la-spinner change_spin d-none"></i></button>
				<!-- <button type="submit" class="btn btn-primary">Add Order</button> -->
			</div>
		</div>
	</div>
</div>



<script src="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.js')); ?>" type="text/javascript"></script>



<script>

	$(document).ready(function() {



		$('#datatable_rows').DataTable({

			processing: true,

			serverSide: true,

			// searchable: false,

			columnDefs: [{

				orderable: false,

				targets: -1,

			}],

			ajax: "<?php echo e(route('admin.vendors.index',$type)); ?>",

			columns: [
                

				{

					"data": "fname"

				},
				{

					"data": "lname"

				},
				{

					"data": "email"

				},
				{

					"data": "number"

				},

				// {

				// 	"data": "is_active"

				// },

				// {

				// 	"data": "status",

				// 	"className": "text-center  status_td"

				// },

				{

					orderable: false,

					searchable: false,

					data: 'singlecheckbox',

				},
				{

					orderable: false,

					searchable: false,

					data: 'action',

				},
				{

					orderable: false,

					searchable: false,

					data: 'action1',

				},



			]

		});

        $(document).on("change", ".change_status_user", function() {
            // alert('Hello');
            // return;
            var parent = $(this);
            var ids = [];
            var idrow = this.id.split('-');
            ids.push(idrow[1]);
            var params = '';
            var rowparam = parent.attr('href').split('-');
            if (rowparam[1] == '1') {
                params = '1';
            } else {
                params = '0';
            }

            var field = "status";
            Changeuser(ids,field,params);
            return false;
        });
       });

        function Changeuser(ids,field,params) {
            var table = "users";
            $(ids).each(function() {

                $('#' + field + '-' + this).addClass('disabled');

                $('#' + field + '-' + this).html('<i class="fa fa-spinner fa-spin"></i>');

            });

            $.ajax({
                url: "<?php echo e(route('admin.vendors.change_status')); ?>",

                data: 'id=' + ids + '&table_name=' + table + '&field=' + field + '&param=' + params,

                dataType: 'json',


                success: function(data) {
                    if (data.status == 'Success') {
                        toastr["success"](data.message, "Success");
                        location.reload();
                        
                    } else {
                        toastr["error"](data.message, "Error");
                    }
                }
            });
        }


</script>



<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel training\crazy_world\resources\views/adminseller/vendors/index.blade.php ENDPATH**/ ?>