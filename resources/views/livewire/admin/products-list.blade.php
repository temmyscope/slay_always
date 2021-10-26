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
															@if ( !$products->empty() )

																@foreach ($products as $product)
																<tr>
																	<td>
																			<a href="#"><img src="{!! env('APP_URL').$product->image->img_url !!}" alt="" /></a>
																	</td>
																	<td>
																			<a href="#"> <h6>{!! $product->name !!}</h6></a>
																			<span>{!! $product->description !!}</span>
																	</td>
																	<td>NGN {!! $product->price !!}</td>
																	@if ( $product->quantity > 0 )
																		<td class="font-success">In Stock ({!! $product->quantity !!})</td>
																	@else
																		<td class="font-danger">out of stock</td>
																	@endif
																	<td>
																			<button 
																				wire.click="delete({!! $product->id !!})" class="btn btn-danger btn-xs" type="button" 
																				data-original-title="btn btn-danger btn-xs" title=""
																			>Delete</button>
																			<a href="{!! route('productcreate', ['product' => $product->id]) !!}">
																				<button 
																					wire.click="" class="btn btn-primary btn-xs" type="button" 
																					data-original-title="btn btn-danger btn-xs" title="">
																					Edit
																				</button>
																			</a>
																	</td>
																</tr>
																@endforeach
																	
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