@section('title', 'Product Create')

<div>
	
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-sm-12">
	            <div class="card">
									<div class="card-header pb-0">
											<h5> Product</h5>
									</div>
	                <div class="card-body">
	                    <form class="form theme-form" wire:submit.prevent="save">
												<div class="row">
													<div class="col-sm-4">
														<div class="mb-3">
															<label>Product Name</label>
															<input wire:model.defer="name" class="form-control" type="text" placeholder="Enter product Name" />
														</div>
													</div>

													<div class="col-sm-4">
														<div class="mb-3">
															<label>Product Price(₦)</label>
															<input wire:model.defer="price"  class="form-control" type="text" placeholder="Enter product Price" />
														</div>
													</div>

													<div class="col-sm-4">
														<div class="mb-3">
															<label>Available Stock/Quantity(#)</label>
															<input wire:model.defer="qty" class="form-control" type="text" placeholder="Enter product Quantity or leave empty" />
														</div>
													</div>
												</div>
												<div class="row">

													<div class="col-sm-6">
														<div class="mb-3">
															<label>Available Colors (Leave empty if all colors are available)</label>
															<input wire:model.defer="colors" class="form-control" type="text" placeholder="E.g. Red, Green" />
														</div>
													</div>

													<div class="col-sm-6">
														<div class="mb-3">
															<label>Available Sizes (Leave empty if all sizes are available)</label>
															<input wire:model.defer="sizes" class="form-control" type="text" placeholder="E.g. XL, XXL, L" />
														</div>
													</div>

												</div>

												<div class="row">

													<div class="col">
														<div class="mb-3">
															<label>Category/Tags (categories available)</label>
															<input wire:model.defer="tags" class="form-control" type="text" placeholder="E.g. Unisex, Ladies Wear, etc." />
														</div>
													</div>

												</div>

												<div class="row">
													<div class="col">
														<div class="mb-3">
															<label>Enter Product Details</label>
															<textarea wire:model.defer="desc" class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>
														</div>
													</div>
												</div>
												<div class="row">
														<div class="col">
																<div class="text-end">
																	<button class="btn btn-secondary me-3 sweet-8" type="submit">
																		Add
																		<span wire:loading wire:target="save"><i class="fa fa-spinner faa-spin animated"></i>
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
@endpush