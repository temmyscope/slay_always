@section('title', 'Product Create')

@push('css')
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dropzone.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
@endpush

<div>
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
															<input wire:model="name" class="form-control" type="text" placeholder="Enter product Name" />
														</div>
													</div>
													<div class="col-sm-4">
														<div class="mb-3">
															<label>Product Price(₦)</label>
															<input wire:model="price" class="form-control" type="text" placeholder="Enter product Price" />
														</div>
													</div>
													<div class="col-sm-4">
														<div class="mb-3">
															<label>Available Quantity(#)</label>
															<input wire:model="qty" class="form-control" type="text" placeholder="Enter product Quantity" />
														</div>
													</div>
												</div>
												<div class="row">

													<div class="col-sm-6">

														<div class="mb-3">
															<label>Available Colors</label>
															<select wire:model="colors" class="js-example-basic-multiple col-sm-12" multiple="multiple">
																<option value="AL">Alabama</option>
																<option value="WY">Wyoming</option>
																<option value="WY">Coming</option>
																<option value="WY">Hanry Die</option>
																<option value="WY">John Doe</option>
															</select>
														</div>

													</div>

													<div class="col-sm-6">

														<div class="mb-3">
															<label>Available Sizes</label>
															<select wire:model="price" class="js-example-basic-multiple col-sm-12" multiple="multiple">
																<option value="AL">Alabama</option>
																<option value="WY">Wyoming</option>
																<option value="WY">Coming</option>
																<option value="WY">Hanry Die</option>
																<option value="WY">John Doe</option>
															</select>
														</div>
														
													</div>
													

												</div>

												<div class="row">

													<div class="col">
														<div class="mb-3">
															<label>Category/Tags</label>
															<select class="js-example-basic-multiple col-sm-12" multiple="multiple">
																<option wire:keydown="add('tags', 'Alabama')" value="AL">Alabama</option>
																<option wire:keydown="add('tags', 'Wyoming')" value="WY">Wyoming</option>
																<option wire:keydown="add('tags', 'Coming')" value="WY">Coming</option>
															</select>
														</div>
													</div>

												</div>

												<div class="row">
													<div class="col">
														<div class="mb-3">
															<label>Enter Product Details</label>
															<textarea wire:model="description" class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col">
														<div class="mb-3">
															<label>Upload product images</label>
															<div class="dropzone dz-message needsclick" 
																style="display:flex;justify-content:center;align-items:stretch;"
															>
																<h6>Drop files here or click to upload.</h6>
																<input type="file" wire:model="photo" multiple />
																@error('photos.*') <span class="error">{{ $message }}</span> @enderror
															</div>

														</div>
													</div>
												</div>
												<div class="row">
														<div class="col">
																<div class="text-end">
																	<button class="btn btn-secondary me-3 sweet-8"  onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-8']);">
																		Add
																	</button>
																	<a class="btn btn-danger">Cancel</a>
																</div>
														</div>
												</div>

	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	<script>
		document.addEventListener('livewire:load', function () {
			console.log({!! $tags !!});
		})
	</script>

</div>	



@push('scripts')
	<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
	<script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
	<script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
	<script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script>
	<script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
	<script src="{{asset('assets/js/sweet-alert/app.js')}}"></script>
@endpush