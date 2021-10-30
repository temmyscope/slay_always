@section('title', 'Update Product')

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
															<input wire:model="price"  class="form-control" type="text" placeholder="Enter product Price" />
														</div>
													</div>
													<div class="col-sm-4">
														<div class="mb-3">
															<label>Available Stock/Quantity(#)</label>
															<input wire:model="qty" class="form-control" type="text" placeholder="Enter product Quantity or leave empty" />
														</div>
													</div>
												</div>
												<div class="row">

													<div class="col-sm-6">

														<div class="mb-3">

															<label>Available Colors</label>
															<select wire:model="colors" class="js-example-basic-multiple col-sm-12" multiple="multiple">
																@forelse ($sizeOptions as $item)
																<option wire:keydown="add('sizes', {!! $item !!})" value="{!! $item !!}">
																	{!! ucfirst($item) !!}
																</option>
																@empty
																<option value="">Add Colors in Settings First</option>
																@endforelse
															</select>
														</div>

													</div>

													<div class="col-sm-6">
														<div class="mb-3">
															<label>Available Sizes</label>
															<select wire:model="sizes" class="js-example-basic-multiple col-sm-12" multiple="multiple">
																@forelse ($sizeOptions as $item)
																<option wire:keydown="add('sizes', {!! $item !!})" value="{!! $item !!}">
																	{!! ucfirst($item) !!}
																</option>
																@empty
																<option value="">Add Sizes in Settings First</option>
																@endforelse
															</select>
														</div>
														
													</div>
													

												</div>

												<div class="row">

													<div class="col">
														<div class="mb-3">
															<label>Category/Tags</label>
															<select wire:model="tags" class="js-example-basic-multiple col-sm-12" multiple="multiple">
																@forelse ($tagOptions as $item)
																<option wire:keydown="add('tags', {!! $item !!})" value="AL">{!! ucfirst($item) !!}</option>
																@empty
																<option value="">Add Categories in Settings First</option>
																@endforelse
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
																style="display:flex;justify-content:center;align-items:stretch;cursor: pointer;"
																onclick="document.getElementById('product-image').click()"
															>
																<h6>Drop files here or click to upload.</h6>
																@error('photos.*') <span class="error">{{ $message }}</span> @enderror
																@if ($images && !empty($images))
																	<div class="dz-preview dz-processing dz-image-preview dz-error dz-complete">
																		@foreach ($images as $item)
																			<div class="dz-image">
																				<img src="{!! $item->temporaryUrl() !!}" />
																			</div>
																		@endforeach
																	</div>
																@endif
															</div>
															<input type="file" wire:model="image" multiple style="display: none;" id="product-image" />

														</div>
													</div>
												</div>
												<div class="row">
														<div class="col">
																<div class="text-end">
																	<button class="btn btn-secondary me-3 sweet-8" wire:click="save" >
																		Add
																	</button>
																</div>
														</div>
												</div>

	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

</div>	



@push('scripts')
	<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
	<script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
	<script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
	<script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script>
	<script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
	<script src="{{asset('assets/js/sweet-alert/app.js')}}"></script>
@endpush