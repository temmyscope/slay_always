@extends('layouts.admin.master')

@section('title', 'Order')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endpush

@section('content')

	<div class="container-fluid">
	    <div class="row">
	        <div class="col-sm-12">
	            <div class="card">
	                <div class="card-header pb-0">
	                    <h5>Order history</h5>
	                </div>
	                <div class="card-body">
	                    <div class="order-history table-responsive">
	                        <table class="table table-bordernone display" id="basic-1">
	                            <thead>
	                                <tr>
	                                    <th scope="col">Order Ref.</th>
	                                    <th scope="col">User</th>
	                                    <th scope="col">Order status</th>
	                                    <th scope="col">Price (&#8358;)</th>
	                                    <th scope="col">Action</th>
	                                </tr>
	                            </thead>
	                            <tbody>
															@if(!empty($orders))
																@foreach ($orders as $order)
																<tr>
																	<td>
																		<a href="{!! route('admin-order', ['id' => $order->id]) !!}">
																			{!! substr($order->txn_id, 0, 16) !!} 
																		</a>
																	</td>

																	<td>
																			<div class="product-name">
																				{!! $order->user->name !!}
																			</div>
																	</td>

																	<td>
																		<div class="order-process">
																			<span class="order-process-circle"></span>{!! ucfirst($order->status) !!}
																		</div>
																	</td>
																	
																	<td>{!! number_format($order->total) !!}</td>

																	<td>
																		<a 
																			class="badge badge-secondary" data-bs-toggle="tooltip" 
																			data-bs-placement="bottom" title="view order" href="{!! route('admin-order', [ 'id' => $order->id ]) !!}">
																			<i data-feather="eye"></i>
																		</a>
																	</td>
																</tr>
																@endforeach
															@endif
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	
	@push('scripts')
	<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
	@endpush

@endsection