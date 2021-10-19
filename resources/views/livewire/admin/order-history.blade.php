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
	                                    <th scope="col">Price</th>
	                                    <th scope="col">Action</th>
	                                </tr>
	                            </thead>
	                            <tbody>
																@forelse ($orders as $order)
																<tr>
																	<td>
																			<a href="/order/{!! $order->id !!}">{!! $order->txn_id !!} </a>
																	</td>
																	<td>
																			<div class="product-name">
																					<a href="/user/{!! $order->user_id !!}">{!! $order->user->name !!}</a>
																			</div>
																	</td>
																	<td>
																		<div class="order-process">
																			<span class="order-process-circle"></span>{!! $order->status !!}
																		</div>
																	</td>
																	<td>{!! $order->total !!}</td>
																	<td>
																		<a class="badge badge-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="cancel order" href="#">
																			<i data-feather="x-cancel"></i>
																		</a>
																		<a class="badge badge-secondary" data-bs-toggle="tooltip" 
																			data-bs-placement="bottom" title="view order" href="/order/{!! $order->id !!}">
																			<i data-feather="eye"></i>
																		</a>
																		<a class="badge badge-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="refund and cancel order" href="#">
																			<i data-feather="refresh-ccw"></i>
																		</a>
																	</td>
																</tr>
																@empty
																		
																@endforelse
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