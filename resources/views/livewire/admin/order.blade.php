@section('title', 'Order')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick-theme.css')}}">
@endpush

<div>
	
	<div class="container-fluid">
	    <div>
	        <div class="row product-page-main p-0">
	            <div class="col-xl-5 col-md-6 box-col-12 xl-50">
	                <div class="card">
	                    <div class="card-body">

												<div class="row" style="display: flex; justify-content:center;">
													<span class="alert-danger" style="text-align: center">{!! session('') ?? '' !!}</span>
												</div>

												<div class="row">
													<div class="col-xl-9 product-main">
														<div class="pro-slide-single">
															@foreach ($products as $key => $item)
															<div> <img class="img-fluid" src="{!! cdnizeURL($item['image']) !!}" alt="" /> </div>
															@endforeach
														</div>
													</div>
													<div class="col-xl-3 product-thumbnail">
														<div class="pro-slide-right">
															@foreach ($products as $item)
															<div>
																<div class="slide-box">
																	<img src="{!! cdnizeURL($item['image']) !!}" alt="" />
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
	                            </div>
	                            <div class="product-price">
																&#8358;{!!number_format($order->total)!!}
																<del>SubTotal (Before Tax): &#8358;{!! array_reduce($products, fn($v, $k)=> $v+$k['price']) !!} </del>
	                            </div>
	                        </div>

	                        <div class="pro-group pb-0">
														@if($order->delivery_status !== 'completed')
	                            <div class="pro-shop">
	                                <a class="btn btn-primary m-r-10" href="cart" wire:click.prevent="markOrderAsDelivered">
																		<i class="fa fa-shopping-basket me-2"></i>Mark Order as Delivered
																	</a>
	                                <a 
																		class="btn btn-danger" href="list-wish" 
																		wire:click.prevent="cancelOrder({!! $order->id !!}, {!! $order->txn_id !!})"
																	>
																		<i class="fa fa-ban me-2"></i>Delete Order
																	</a>
	                            </div>
														@endif
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-xl-2 col-md-6 box-col-6 xl-50 proorder-lg-1">
	                <div class="card">
	                    <div class="card-body">
	                        <!-- side-bar colleps block stat-->
	                        <div class="filter-block">
														<h4>Ordered Products</h4>

														<ul>

															@foreach ($products as $key => $item)
															<li>
																<div class="form-check">
																	<label class="form-check-label" for="{!! $item['name'] !!}">{!! $item['name'] !!}</label>
																	<a class="btn btn-danger" wire:click.prevent="removeItem({!! $key !!})">
																		<i class="fa fa-ban me-2"></i>Remove Item
																	</a>
																</div>
															</li>
															@endforeach

														</ul>

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
	                                            <h5>Delivery</h5>
	                                            <p>{!! ucfirst($order->delivery_status) !!}</p>
	                                        </div>
	                                    </div>
	                                </li>
	                                <li>
	                                    <div class="media">
	                                        <i data-feather="clock"></i>
	                                        <div class="media-body">
	                                            <h5>Payment</h5>
	                                            <p>{!! ucfirst($order->status) !!}</p>
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
	<script src="{{asset('assets/js/slick-slider/slick.min.js')}}"></script>
	<script src="{{asset('assets/js/slick-slider/slick-theme.js')}}"></script>
@endpush