@extends('layouts.admin.master')

@section('title', 'Product List')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owlcarousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/rating.css')}}">
@endpush

@section('content')
	
	<div class="container-fluid list-products">
	    <div class="row">
	        <!-- Individual column searching (text inputs) Starts-->
	        <div class="col-sm-12">
	            <div class="card">
	                <div class="card-header pb-0">
	                    <h5>All Available Products</h5>
	                </div>
	                <div class="card-body">
	                    <div class="table-responsive product-table">
	                        <table class="display" id="basic-1">
	                            <thead>
	                                <tr>
	                                    <th>Image</th>
	                                    <th>Details</th>
	                                    <th>Amount</th>
	                                    <th>Stock (Quantity)</th>
	                                    <th>Action</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                                <tr>
	                                    <td>
	                                        <a href="#"><img src="{{asset('assets/images/ecommerce/product-table-1.png')}}" alt="" /></a>
	                                    </td>
	                                    <td>
	                                        <a href="#"> <h6>Red Lipstick</h6></a><span>Interchargebla lens Digital Camera with APS-C-X Trans CMOS Sens</span>
	                                    </td>
	                                    <td>$10</td>
	                                    <td class="font-success">In Stock (12)</td>
	                                    <td>
	                                        <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button>
	                                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <td>
	                                        <a href="#"><img src="{{asset('assets/images/ecommerce/product-table-1.png')}}" alt="" /></a>
	                                    </td>
	                                    <td>
	                                        <a href="#"> <h6>Red Lipstick</h6></a><span>Interchargebla lens Digital Camera with APS-C-X Trans CMOS Sens</span>
	                                    </td>
	                                    <td>$10</td>
	                                    <td class="font-success">In Stock (12)</td>
	                                    <td>
	                                        <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button>
	                                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <td>
	                                        <a href="#"><img src="{{asset('assets/images/ecommerce/product-table-1.png')}}" alt="" /></a>
	                                    </td>
	                                    <td>
	                                        <a href="#"> <h6>Red Lipstick</h6></a><span>Interchargebla lens Digital Camera with APS-C-X Trans CMOS Sens</span>
	                                    </td>
	                                    <td>$10</td>
	                                    <td class="font-success">In Stock (12)</td>
	                                    <td>
	                                        <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button>
	                                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <td>
	                                        <a href="#"><img src="{{asset('assets/images/ecommerce/product-table-1.png')}}" alt="" /></a>
	                                    </td>
	                                    <td>
	                                        <a href="#"> <h6>Red Lipstick</h6></a><span>Interchargebla lens Digital Camera with APS-C-X Trans CMOS Sens</span>
	                                    </td>
	                                    <td>$10</td>
	                                    <td class="font-success">In Stock (12)</td>
	                                    <td>
	                                        <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button>
	                                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <td>
	                                        <a href="#"><img src="{{asset('assets/images/ecommerce/product-table-1.png')}}" alt="" /></a>
	                                    </td>
	                                    <td>
	                                        <a href="#"> <h6>Red Lipstick</h6></a><span>Interchargebla lens Digital Camera with APS-C-X Trans CMOS Sens</span>
	                                    </td>
	                                    <td>$10</td>
	                                    <td class="font-success">In Stock (12)</td>
	                                    <td>
	                                        <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button>
	                                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <td>
	                                        <a href="#"><img src="{{asset('assets/images/ecommerce/product-table-1.png')}}" alt="" /></a>
	                                    </td>
	                                    <td>
	                                        <a href="#"> <h6>Red Lipstick</h6></a><span>Interchargebla lens Digital Camera with APS-C-X Trans CMOS Sens</span>
	                                    </td>
	                                    <td>$10</td>
	                                    <td class="font-success">In Stock (12)</td>
	                                    <td>
	                                        <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button>
	                                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <td>
	                                        <a href="#"><img src="{{asset('assets/images/ecommerce/product-table-1.png')}}" alt="" /></a>
	                                    </td>
	                                    <td>
	                                        <a href="#"> <h6>Red Lipstick</h6></a><span>Interchargebla lens Digital Camera with APS-C-X Trans CMOS Sens</span>
	                                    </td>
	                                    <td>$10</td>
	                                    <td class="font-success">In Stock (12)</td>
	                                    <td>
	                                        <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button>
	                                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <td>
	                                        <a href="#"><img src="{{asset('assets/images/ecommerce/product-table-1.png')}}" alt="" /></a>
	                                    </td>
	                                    <td>
	                                        <a href="#"> <h6>Red Lipstick</h6></a><span>Interchargebla lens Digital Camera with APS-C-X Trans CMOS Sens</span>
	                                    </td>
	                                    <td>$10</td>
	                                    <td class="font-success">In Stock (12)</td>
	                                    <td>
	                                        <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button>
	                                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <td>
	                                        <a href="#"><img src="{{asset('assets/images/ecommerce/product-table-1.png')}}" alt="" /></a>
	                                    </td>
	                                    <td>
	                                        <a href="#"> <h6>Red Lipstick</h6></a><span>Interchargebla lens Digital Camera with APS-C-X Trans CMOS Sens</span>
	                                    </td>
	                                    <td>$10</td>
	                                    <td class="font-success">In Stock (12)</td>
	                                    <td>
	                                        <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button>
	                                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button>
	                                    </td>
	                                </tr>
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!-- Individual column searching (text inputs) Ends-->
	    </div>
	</div>

	@push('scripts')
	<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/rating/jquery.barrating.js')}}"></script>
    <script src="{{asset('assets/js/rating/rating-script.js')}}"></script>
    <script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
    <script src="{{asset('assets/js/ecommerce.js')}}"></script>
    <script src="{{asset('assets/js/product-list-custom.js')}}"></script>
	@endpush

@endsection