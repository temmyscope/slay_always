@section('title', 'Product Create')

<div>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
	<script>
		//document.addEventListener('livewire:load', function () {
		function insertValueOnColorsModel(colors){
			let len = @this.colors.length;
			@this.colors[len] = colors.value;
			console.log([len,  @this.colors]);
		}
		function insertValueOnSizesModel(sizes){
			let len = @this.sizes.length;
			@this.sizes[len] = sizes.value;
		}
		function insertValueOnTagsModel(tags){
			let len = @this.tags.length;
			@this.tags[len] = tags.value;
		}	
	</script>
	
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
															<input wire:model.defer="product" class="form-control" type="text" placeholder="Enter product Name" />
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
															<label>Available Colors</label>
															<select 
																class="js-example-basic-multiple col-sm-12" multiple
																onchange="insertValueOnColorsModel(this)" 
															>
																@forelse ($colorOptions as $item)
																<option
																	value="{!! ucfirst(trim($item)) !!}" wire:click="$wire.set('colors')"
																>
																	{!! ucfirst(trim($item)) !!}
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
															<select 
																class="js-example-basic-multiple col-sm-12" multiple
																onchange="insertValueOnSizesModel(this)"
															>
																@forelse ($sizeOptions as $item)
																<option value="{!! trim($item) !!}" id="{!! $item !!}" >
																	{!! ucfirst(trim($item)) !!}
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
															<select 
																class="js-example-basic-multiple col-sm-12" multiple="multiple"
																onchange="insertValueOnTagsModel(this)"
															>
																@forelse ($tagOptions as $item)
																<option value="{!! trim($item) !!}">
																	{!! ucfirst(trim($item)) !!}
																</option>
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