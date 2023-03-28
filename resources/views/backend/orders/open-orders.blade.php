@extends('layouts.backend.master')

@section('toolbar')
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Orders Management</h1>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div id="kt_content_container" class="container-xxl">
		<div class="card" id="kt_pricing">
			<div class="card-body p-lg-17">
				<div class="d-flex flex-column">
					<div class="nav-group nav-group-outline mx-auto mb-15" data-kt-buttons="true">
						<button class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3 me-2 active" onclick="changeDiv('New');">New</button>
						<button class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3" onclick="changeDiv('Accepted')">Accepted</button>
						<button class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3" onclick="changeDiv('Scheduled')">Scheduled</button>
						<button class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3" onclick="changeDiv('Out-For-Delivery')">Out-For-Delivery</button>
					</div>
					@if(count($new) > 0)
					<div id="New" class="status-div row g-10">
						@foreach($new as $order)
						<div class="col-xl-4">
							<div class="d-flex h-100 align-items-center">
								<div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
									<div class="mb-7 order-box text-center card-rounded border-2 bg-danger py-5">
										<h1 class="text-dark mb-5 fw-boldest">{{ $order->contact_person }}</h1>
										<div class="text-gray-400 fw-bold mb-5">{{ $order->address }}</div>
										<a href="{{ route('page.order.details', $order->id) }}" class="btn btn-sm btn-primary">View Order</a>
									</div>
									<div class="w-100 mb-10">
										<div class="d-flex align-items-center mb-5">
											@if(count($order->order_items) > 0)
											@foreach($order->order_items as $item)
											<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">{{ $item->quantity }} X {{ $item->title }}</span>
											@endforeach
											@endif
										</div>
									</div>
									<div class="w-100 mb-10 text-center">
										<a href="javascript:void(0);" class="btn btn-sm btn-success" onclick="takeAction({{ $order->id }}, 'Accepted')">Accept</a>
										<a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="takeAction({{ $order->id }}, 'Rejected')">Reject</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					@endif
					
					@if(count($accepted) > 0)
					<div id="Accepted" class="status-div row g-10" style="display:none;">
						@foreach($accepted as $order)
						<div class="col-xl-4">
							<div class="d-flex h-100 align-items-center">
								<div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
									<div class="mb-7 order-box text-center card-rounded border-2 bg-danger py-5">
										<h1 class="text-dark mb-5 fw-boldest">{{ $order->contact_person }}</h1>
										<div class="text-gray-400 fw-bold mb-5">{{ $order->address }}</div>
										<a href="{{ route('page.order.details', $order->id) }}" class="btn btn-sm btn-primary">View Order</a>
									</div>
									<div class="w-100 mb-10">
										<div class="d-flex align-items-center mb-5">
											@if(count($order->order_items) > 0)
											@foreach($order->order_items as $item)
											<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">{{ $item->quantity }} X {{ $item->title }}</span>
											@endforeach
											@endif
										</div>
									</div>
									<div class="w-100 mb-10 text-center">
										<a href="javascript:void(0);" class="btn btn-sm btn-success" onclick="takeAction({{ $order->id }}, 'Scheduled')">Schedule</a>
										<a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="takeAction({{ $order->id }}, 'Canceled')">Cancle</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					@endif
					
					@if(count($scheduled) > 0)
					<div id="Scheduled" class="status-div row g-10" style="display:none;">
						@foreach($scheduled as $order)
						<div class="col-xl-4">
							<div class="d-flex h-100 align-items-center">
								<div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
									<div class="mb-7 order-box text-center card-rounded border-2 bg-danger py-5">
										<h1 class="text-dark mb-5 fw-boldest">{{ $order->contact_person }}</h1>
										<div class="text-gray-400 fw-bold mb-5">{{ $order->address }}</div>
										<a href="{{ route('page.order.details', $order->id) }}" class="btn btn-sm btn-primary">View Order</a>
									</div>
									<div class="w-100 mb-10">
										<div class="d-flex align-items-center mb-5">
											@if(count($order->order_items) > 0)
											@foreach($order->order_items as $item)
											<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">{{ $item->quantity }} X {{ $item->title }}</span>
											@endforeach
											@endif
										</div>
									</div>
									<div class="w-100 mb-10 text-center">
										<a href="javascript:void(0);" class="btn btn-sm btn-success" onclick="takeAction({{ $order->id }}, 'Out-For-Delivery')">Out of delivery</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					@endif
					
					@if(count($outForDelivery) > 0)
					<div id="Out-For-Delivery" class="status-div row g-10" style="display:none;">
						@foreach($outForDelivery as $order)
						<div class="col-xl-4">
							<div class="d-flex h-100 align-items-center">
								<div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
									<div class="mb-7 order-box text-center card-rounded border-2 bg-danger py-5">
										<h1 class="text-dark mb-5 fw-boldest">{{ $order->contact_person }}</h1>
										<div class="text-gray-400 fw-bold mb-5">{{ $order->address }}</div>
										<a href="{{ route('page.order.details', $order->id) }}" class="btn btn-sm btn-primary">View Order</a>
									</div>
									<div class="w-100 mb-10">
										<div class="d-flex align-items-center mb-5">
											@if(count($order->order_items) > 0)
											@foreach($order->order_items as $item)
											<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">{{ $item->quantity }} X {{ $item->title }}</span>
											@endforeach
											@endif
										</div>
									</div>
									<div class="w-100 mb-10 text-center">
										<a href="javascript:void(0);" class="btn btn-sm btn-success" onclick="takeAction({{ $order->id }}, 'Completed')">Complete</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
<script>

	function changeDiv(status=''){
		$('.status-div').hide();
		$('#'+status).show();
	}

	// Change Orders Status
	function takeAction(order_id = 0, status=''){
		var data = new FormData();
		data.append('status', status);
		data.append('id', order_id);
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
		}
	}
</script>
@endsection