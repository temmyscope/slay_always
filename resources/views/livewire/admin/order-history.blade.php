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
	                                    <th scope="col">Units</th>
	                                    <th scope="col">Price</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                                <tr>
	                                    <td>
	                                        <a href="/order/1">XY-3478-8790 </a>
	                                    </td>
	                                    <td>
	                                        <div class="product-name">
	                                            <a href="/user/45">Elisha Temiloluwa</a>
	                                        </div>
	                                    </td>
	                                    <td>
																				<div class="order-process">
																					<span class="order-process-circle"></span>Processing
																				</div>
																			</td>
	                                    <td>42</td>
	                                    <td>$55</td>
	                                </tr>
	                                <tr>
	                                    <td>
	                                        <a href="/order/1">XY-3478-8790 </a>
	                                    </td>
	                                    <td>
	                                        <div class="product-name">
	                                            <a href="/user/45">Elisha Temiloluwa</a>
	                                        </div>
	                                    </td>
	                                    <td>
																				<div class="order-process">
																					<span class="order-process-circle"></span>Processing
																				</div>
																			</td>
	                                    <td>42</td>
	                                    <td>$55</td>
	                                </tr>
	                                <tr>
	                                    <td>
	                                        <a href="/order/1">XY-3478-8790 </a>
	                                    </td>
	                                    <td>
	                                        <div class="product-name">
	                                            <a href="/user/45">Elisha Temiloluwa</a>
	                                        </div>
	                                    </td>
	                                    <td>
																				<div class="order-process">
																					<span class="order-process-circle"></span>Processing
																				</div>
																			</td>
	                                    <td>42</td>
	                                    <td>$55</td>
	                                </tr>
	                                <tr>
	                                    <td>
	                                        <a href="/order/1">XY-3478-8790 </a>
	                                    </td>
	                                    <td>
	                                        <div class="product-name">
	                                            <a href="/user/45">Elisha Temiloluwa</a>
	                                        </div>
	                                    </td>
	                                    <td>
																				<div class="order-process">
																					<span class="order-process-circle"></span>Processing
																				</div>
																			</td>
	                                    <td>42</td>
	                                    <td>$55</td>
	                                </tr>
	                                <tr>
	                                    <td>
	                                        <a href="/order/1">XY-3478-8790 </a>
	                                    </td>
	                                    <td>
	                                        <div class="product-name">
	                                            <a href="/user/45">Elisha Temiloluwa</a>
	                                        </div>
	                                    </td>
	                                    <td>
																				<div class="order-process">
																					<span class="order-process-circle"></span>Processing
																				</div>
																			</td>
	                                    <td>42</td>
	                                    <td>$55</td>
	                                </tr>
	                                
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