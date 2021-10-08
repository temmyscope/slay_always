@extends('layouts.admin.master')

@section('title', 'Create Coupon')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dropzone.css')}}">
@endpush

@section('content')
	
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-sm-12">
	            <div class="card">
                    <div class="card-header pb-0">
                            <h5> Add Coupon </h5>
                    </div>
	                <div class="card-body">
	                    <div class="form theme-form">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Coupon Name</label>
                                        <input class="form-control" type="text" placeholder="Enter Coupon Name" />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Coupon Code(#)</label>
                                        <input class="form-control" type="text" placeholder="Enter Coupon Code" />
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Available Dates</label>
                                        <input class="datepicker-here form-control digits" type="text" data-range="true" data-multiple-dates-separator=" - " data-language="en" />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Percentage of Discount(%)</label>
                                        <input class="form-control" type="text" placeholder="Enter Percentage" />
                                    </div>
                                </div>

                            </div>
                            
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Enter Message</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="text-end"><a class="btn btn-secondary me-3" href="#">Add</a><a class="btn btn-danger" href="#">Cancel</a></div>
                                </div>
                            </div>

	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	
	@push('scripts')
	<script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script>
	@endpush

@endsection