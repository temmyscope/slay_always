@extends('layouts.admin.master')

@section('title', 'Product Create')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dropzone.css')}}">
@endpush

@section('content')
	
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-sm-12">
	            <div class="card">
									<div class="card-header pb-0">
											<h5> Product</h5>
									</div>
	                <div class="card-body">
	                    <div class="form theme-form">
												<div class="row">
													<div class="col-sm-4">
														<div class="mb-3">
															<label>Product Name</label>
															<input class="form-control" type="text" placeholder="Enter product Name" />
														</div>
													</div>
													<div class="col-sm-4">
														<div class="mb-3">
															<label>Product Price(#)</label>
															<input class="form-control" type="text" placeholder="Enter product Price" />
														</div>
													</div>
													<div class="col-sm-4">
														<div class="mb-3">
															<label>Available Quantity(#)</label>
															<input class="form-control" type="text" placeholder="Enter product Quantity" />
														</div>
													</div>
												</div>
												<div class="row">
														<div class="col">
																<div class="mb-3">
																		<label>Enter Product Details</label>
																		<textarea class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>
																</div>
														</div>
												</div>
												<div class="row">
														<div class="col">
																<div class="mb-3">
																		<label>Upload product images</label>
																		<form class="dropzone" id="singleFileUpload" action="/upload.php">
																				<div class="dz-message needsclick">
																						<i class="icon-cloud-up"></i>
																						<h6>Drop files here or click to upload.</h6>
																						<span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
																				</div>
																		</form>
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