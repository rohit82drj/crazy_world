@extends('admin.main')

@section('content')

<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />



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

						Ticket

					</h3>

				</div>

				<div class="kt-portlet__head-toolbar">

					<div class="kt-portlet__head-wrapper">

						<div class="kt-portlet__head-actions">

							<a href="{{ route('admin.ticket.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">

								<i class="la la-plus"></i>

								Add Ticket

							</a>

						</div>

					</div>

				</div>

			</div>

			<div class="kt-portlet__body">

				<div id="kt_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4">

					<table class="table table-striped- table-bordered table-hover table-checkable datatable" id="datatable_rows">

						@csrf

						<thead>

							<tr>

								<th><input type="checkbox" id="selectall" /></th>

								<th>Name</th>
								<th>Email</th>
								<th>Number</th>
								<th>Action</th>
								<th>Status</th>



							</tr>

						</thead>

						<tbody>

						</tbody>

					</table>

				</div>

			</div>



			@include('admin.layout.multiple_action', array(

			'table_name' => 'tickets',

			'is_orderby'=>'yes',

			'folder_name'=>'',

			'action' => array('delete' => __('Delete'))

			))

		</div>

	</div>

</div>

@stop

@push('scripts')



<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>



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

			ajax: "{{ route('admin.ticket.index') }}",

			columns: [{

					orderable: false,

					searchable: false,

					data: 'checkbox',

				},

				{
					"data": "fullname"
				},
				{
					"data": "email"
				},
				{
					"data": "number"
				},

				{

					orderable: false,

					searchable: false,

					data: 'action',

				},
				{

					orderable: false,

					searchable: false,

					data: 'status',

				},


			]

		});
	});

</script>



@endpush