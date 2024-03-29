@section('title', 'Product List')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owlcarousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/rating.css')}}">
@endpush

<div>
	
	<div class="container-fluid list-products">
	    <div class="row">
	        <!-- Individual column searching (text inputs) Starts-->
	        <div class="col-sm-12">
	            <div class="card">
	                <div class="card-header pb-0" style="display: flex;justify-content:space-between;">
	                  <h5>All Available Products</h5>
										@if ($binVisibility === true)
											<button
												wire:click="switchVisibility" type="button"
												class="btn btn-success  btn-xs" 
												data-original-title="btn btn-success btn-xs"
											>  Show Product
												<span wire:loading wire:target="switchVisibility">
													<i class="fa fa-spinner faa-spin animated"></i>
												</span>
											</button>
										@else
											<button
												wire:click="switchVisibility" type="button"
												class="btn btn-danger btn-xs" 
												data-original-title="btn btn-danger btn-xs"
											> See Recycle Bin
												<span wire:loading wire:target="switchVisibility">
													<i class="fa fa-spinner faa-spin animated"></i>
												</span>
											</button>
										@endif
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
															@if ($binVisibility === true)
																@if ( $bin && !empty($bin) )
																	@foreach ($bin as $product)
																	<tr class="pb-1">
																		<td>
																				<a href="">
																					<img src="{!! cdnizeURL($product->images[0]->src ?? '') !!}" alt="" />
																				</a>
																		</td>
																		<td>
																				<a href=""> <h6>{!! $product->name !!}</h6></a>
																				<span>{!! $product->description !!}</span>
																		</td>
																		<td>₦{!! $product->price !!}</td>
																		@if ( $product->quantity > 0 )
																			<td class="font-success">In Stock ({!! $product->quantity !!})</td>
																		@else
																			<td class="font-danger">out of stock</td>
																		@endif
																		<td 
																			style="display:flex;flex-direction:column;justify-content:space-evenly;align-items:stretch;align-content:space-between"
																		>
																			<button 
																				wire:click="delete({!! $product->id !!})" class="btn btn-danger btn-xs" type="button" 
																				data-original-title="btn btn-danger btn-xs" title=""
																			>Delete
																			<span wire:loading wire:target="delete"><i class="fa fa-spinner faa-spin animated"></i></span>
																			</button>
																				<hr/>
																				<a class="btn btn-primary btn-xs" data-original-title="btn btn-danger btn-xs" 
																					href="{!! route('product', ['id' => $product->id]) !!}"
																				>
																					Edit
																				</a>
																				<hr/>
																				<a class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs"
																					href="{!! route('add-image', ['id' => $product->id, 'type' => 'product']) !!}"
																				>
																					Add Image(s)
																				</a>
																		</td>
																	</tr>
																	@endforeach
																		
																@endif	
															@else
																@if ( $products )
																	@foreach ($products as $product)
																	<tr class="pb-1">
																		<td>
																				<a href="">
																					<img src="{!! cdnizeURL($product->images[0]->src ?? '') !!}" alt="" />
																				</a>
																		</td>
																		<td>
																				<a href=""> <h6>{!! $product->name !!}</h6></a>
																				<span>{!! $product->description !!}</span>
																		</td>
																		<td>₦{!! $product->price !!}</td>
																		@if ( $product->quantity > 0 )
																			<td class="font-success">In Stock ({!! $product->quantity !!})</td>
																		@else
																			<td class="font-danger">out of stock</td>
																		@endif
																		<td 
																			style="display:flex;flex-direction:column;justify-content:space-evenly;align-items:stretch;align-content:space-between"
																		>
																			<button 
																				wire:click="delete({!! $product->id !!})" class="btn btn-danger btn-xs" type="button" 
																				data-original-title="btn btn-danger btn-xs" title=""
																			>Delete
																			<span wire:loading wire:target="delete"><i class="fa fa-spinner faa-spin animated"></i></span>
																			</button>
																				<hr/>
																				<a class="btn btn-primary btn-xs" data-original-title="btn btn-danger btn-xs" 
																					href="{!! route('product', ['id' => $product->id]) !!}"
																				>
																					Edit
																				</a>
																				<hr/>
																				<a class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs"
																					href="{!! route('add-image', ['id' => $product->id, 'type' => 'product']) !!}"
																				>
																					Add Image(s)
																				</a>
																		</td>
																	</tr>
																	@endforeach
																		
																@endif
																	
															@endif

	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!-- Individual column searching (text inputs) Ends-->
	    </div>
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