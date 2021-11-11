@section('title', 'Order')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick-theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/rating.css')}}">
@endpush

<div>
	
	<div class="container-fluid">
	    <div>
	        <div class="row product-page-main p-0">
	            <div class="col-xl-5 col-md-6 box-col-12 xl-50">
	                <div class="card">
	                    <div class="card-body">
	                        <div class="row">
	                            <div class="col-xl-9 product-main">
	                                <div class="pro-slide-single">
																		@foreach ($products as $item)
																		<div>
																			<img class="img-fluid" src="{!! cdnizeURL($item->images[0]->src) !!}" alt="" />
																		</div>
																		@endforeach
	                                </div>
	                            </div>
	                            <div class="col-xl-3 product-thumbnail">
	                                <div class="pro-slide-right">
																			@foreach ($products as $item)
	                                    <div>
	                                        <div class="slide-box">
																						<img src="{!! cdnizeURL($item->images[0]->src) !!}" alt="" />
																					</div>
	                                    </div>
																			@endforeach
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xl-5 box-col-6 proorder-xl-3 xl-100">
	                <div class="card">
	                    <div class="card-body">
	                        <div class="pro-group pt-0 border-0">
	                            <div class="product-page-details mt-0">
	                                <h3>{!! $order->user->name !!}</h3>
	                                <div class="pro-review">
	                                    <div class="d-flex">
	                                        <select id="u-rating-fontawesome" name="rating" autocomplete="off">
	                                            <option value="1">1</option>
	                                            <option value="2">2</option>
	                                            <option value="3">3</option>
	                                            <option value="4">4</option>
	                                            <option value="5">5</option>
	                                        </select>
	                                        <span>(250 review)</span>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="product-price">
	                                {!!$order->total!!}
	                                <del>{!! array_reduce(fn($v, $k)=> $v+$k['price'], $products) !!} </del>
	                            </div>
	                        </div>

	                        <div class="pro-group pb-0">
	                            <div class="pro-shop">
	                                <a class="btn btn-primary m-r-10" href="cart" wire:click.prevent="markOrderAsDelivered">
																		<i class="fa fa-shopping-basket me-2"></i>Mark Order as Delivered
																	</a>
	                                <a class="btn btn-danger" href="list-wish" wire:click.prevent="">
																		<i class="fa fa-cancel me-2"></i>Remove Checked Items
																	</a>
	                            </div>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-xl-2 col-md-6 box-col-6 xl-50 proorder-lg-1">
	                <div class="card">
	                    <div class="card-body">
	                        <!-- side-bar colleps block stat-->
	                        <div class="filter-block">
														<h4>Ordererd Products</h4>

														<ul>

															@foreach ($products as $item)
															<li>
																<div class="form-check">
																	<label class="form-check-label" for="Raymond">{!! $item->name !!}</label>
																	<a class="btn btn-danger" wire:click="removeItem({!! $item->id !!})" href="list-wish">
																		<i class="fa fa-cancel me-2"></i>Remove From Order
																	</a>
																</div>
															</li>
															@endforeach

														</ul>

														<div class="pro-group pb-0">

															<div class="pro-shop">
																<button class="btn btn-danger" wire:click="cancelOrder({!! $order->id !!}, {!! $order->txn_id !!})">
																	<i class="fa fa-cancel me-2"></i>Cancel Order
																</button>
																<a class="btn btn-danger" wire:click="removeCheckedItems()" href="list-wish">
																	<i class="fa fa-cancel me-2"></i>Update Order
																</a>
															</div>
															
														</div>
														
	                        </div>
	                    </div>
	                </div>
	                <div class="card">
	                    <div class="card-body">
	                        <div class="collection-filter-block">
	                            <ul class="pro-services">
	                                <li>
	                                    <div class="media">
	                                        <i data-feather="truck"></i>
	                                        <div class="media-body">
	                                            <h5>Free Shipping</h5>
	                                            <p>Free Shipping World Wide</p>
	                                        </div>
	                                    </div>
	                                </li>
	                                <li>
	                                    <div class="media">
	                                        <i data-feather="clock"></i>
	                                        <div class="media-body">
	                                            <h5>24 X 7 Service</h5>
	                                            <p>Online Service For New Customer</p>
	                                        </div>
	                                    </div>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                    <!-- silde-bar colleps block end here-->
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

</div>

@push('scripts')
<script src="{{asset('assets/js/rating/jquery.barrating.js')}}"></script>
	<script src="{{asset('assets/js/rating/rating-script.js')}}"></script>
	<script src="{{asset('assets/js/slick-slider/slick.min.js')}}"></script>
	<script src="{{asset('assets/js/slick-slider/slick-theme.js')}}"></script>
@endpush