@extends('layouts.backend.master')

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Order Details</h1>
			</div>
			<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
				<li class="breadcrumb-item text-muted"><a href="{{ route('page.order.list') }}" class="text-muted text-hover-primary">Orders</a></li>
				<span class="h-20px border-gray-300 border-start mx-4"></span>
				<li class="breadcrumb-item text-muted">Details</li>
			</ul>
		</div>
	</div>
@endsection

@section('content')	
	<div id="kt_content_container" class="container-xxl">
		<div class="card">
			<div class="card-body py-20">
				<div class="mw-lg-950px mx-auto w-100">
					<div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
						<h4 class="fw-boldest text-gray-800 fs-2qx pe-5 pb-7">INVOICE</h4>
						<div class="text-sm-end">
							<a href="javascript:void(0);" class="d-block mw-150px ms-sm-auto"><img alt="Logo" src="@if(Settings::get('logo')){{ asset(Settings::get('logo')) }} @endif" class="w-100" /></a>
							<div class="text-sm-end fw-bold fs-4 text-muted mt-7">
								<div>{{Settings::get('address')}}</div>
							</div>
							<div class="text-sm-end fw-bold fs-4 text-muted mt-7">
								@if($data->status == 'New')
								<a href="javascript:void(0);" onclick="takeAction('Accepted')" class="btn btn-light-success my-1">Accept</a>
								<a href="javascript:void(0);" onclick="takeAction('Rejected')" class="btn btn-light-danger my-1">Reject</a>
								@endif
							</div>
						</div>
					</div>
					<div class="pb-12">
						<div class="d-flex flex-column gap-7 gap-md-10">
							<div class="fw-bolder fs-2">{{ $data->contact_person }}
								<span class="fs-6">@if($data->contact_email) ({{ $data->contact_email }}) @endif</span>
							</div>
							<div class="separator"></div>
							<div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bolder">
								<div class="flex-root d-flex flex-column">
									<span class="text-muted">Order ID</span>
									<span class="fs-5">{{ $data->custom_order_id }}</span>
								</div>
								<div class="flex-root d-flex flex-column">
									<span class="text-muted">Date</span>
									<span class="fs-5">{{ $data->order_date }}</span>
								</div>
								<div class="flex-root d-flex flex-column">
									<span class="text-muted">Payment Tracking ID</span>
									<span class="fs-5">{{ $data->payment_tracking_id }}</span>
								</div>
								<div class="flex-root d-flex flex-column">
									<span class="text-muted">Order Status</span>
									<span class="fs-5">{{ $data->status }}</span>
								</div>
							</div>
							<div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bolder">
								<div class="flex-root d-flex flex-column">
									<span class="text-muted">Shiping Address</span>
									<table>
										<tr>
											<td class="max-w-40px">Name:</td>
											<td>{{ $data->contact_person }}</td>
										</tr>
										<tr>
											<td class="max-w-40px">Email:</td>
											<td>{{ $data->contact_email }}</td>
										</tr>
										<tr>
											<td class="max-w-40px">Contact No.:</td>
											<td>{{ $data->contact_number }}</td>
										</tr>
										<tr>
											<td class="max-w-40px">Address:</td>
											<td>{{ $data->address }}</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="d-flex justify-content-between flex-column">
								<div class="table-responsive border-bottom mb-9">
									<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
										<thead>
											<tr class="border-bottom fs-6 fw-bolder text-muted">
												<th class="min-w-175px pb-2">Item</th>
												<th class="min-w-70px text-end pb-2">SKU</th>
												<th class="min-w-80px text-end pb-2">QTY</th>
												<th class="min-w-100px text-end pb-2">Total</th>
											</tr>
										</thead>
										<tbody class="fw-bold text-gray-600">
											@foreach($data->order_items as $key => $item)
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<a href="javascript:void(0);" class="symbol symbol-50px">
															<span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/1.gif);"></span>
														</a>
														<div class="ms-5">
															<div class="fw-bolder">{{$item->product->title}}</div>
															<div class="fs-7 text-muted">Delivery Date: 30/03/2022</div>
														</div>
													</div>
												</td>
												<td class="text-end">03432006</td>
												<td class="text-end">2</td>
												<td class="text-end">$240.00</td>
											</tr>
											@endforeach
											<!-- Footer -->
											<tr>
												<td colspan="3" class="text-end">Subtotal</td>
												<td class="text-end">{{ $data->item_total }}</td>
											</tr>
											<tr>
												<td colspan="3" class="text-end">TAX (18%)</td>
												<td class="text-end">{{ $data->tax }}</td>
											</tr>
											<tr>
												<td colspan="3" class="text-end">Discount</td>
												<td class="text-end">{{ $data->discount }}</td>
											</tr>
											<tr>
												<td colspan="3" class="text-end">Delivery Charges</td>
												<td class="text-end">{{ $data->delivery_charge }}</td>
											</tr>
											<tr>
												<td colspan="3" class="fs-3 text-dark fw-bolder text-end">Grand Total</td>
												<td class="text-dark fs-3 fw-boldest text-end">{{ $data->grand_total }}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="d-flex flex-stack flex-wrap mt-lg-20 pt-13">
						<div class="my-1 me-5">
							<button type="button" class="btn btn-success my-1 me-12" onclick="window.print();">Print Invoice</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
<script>

	$(document).ready(function(e) {
		
	});
	
	// Change Orders Status
	function takeAction(status='Accepted'){
		var data = new FormData();
		data.append('status', status);
		data.append('id', '{{$data->id}}');
		var response = adminAjax('{{route("orders_status")}}', data);
		if(response.status == '200'){
			if(response.data.status == 'success'){
				swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
				setTimeout(function(){ location.reload(); }, 2000)
			}
			else
			{
				swal.fire({title: response.message,type: 'error'});
			}
		} else if(response.status == '201'){
			swal.fire({title: response.message,type: 'error'});
		}
	}
</script>
@endsection