@extends('layouts.admin.master')
@section('title', 'Admin Home')

    @section('content')

      @yield('breadcrumb-list')
      <!-- Container-fluid starts-->
      <div class="container-fluid dashboard-default-sec">
        <div class="row">

          <div class="col-xl-12 box-col-12 des-xl-100">

            <div class="row">

              <div class="col-xl-12 recent-order-sec">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <h5>Recent Orders</h5>
                      <table class="table table-bordernone">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Coupon</th>
                            <th>Value</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>
                              <div class="setting-list">
                                <ul class="list-unstyled setting-option">
                                  <li>
                                    <div class="setting-primary"><i class="icon-settings"></i></div>
                                  </li>
                                  <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                                  <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                                  <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                                  <li><i class="icofont icofont-error close-card font-primary"></i></li>
                                </ul>
                              </div>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($orderList as $order)
                          <tr>
                            <td>
                              <div class="media">
                                <div class="media-body">
                                  <a href="{!! $order->id !!}"><span>{!! $order->txn_id !!}</span></a>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p>{!! $order->created_at !!}</p>
                            </td>
                            <td>
                              <p>{!! $order->coupon ?? "" !!}</p>
                            </td>
                            <td>
                              <p>{!! $order->total !!}</p>
                            </td>
                            <td>
                              <p>{!! $order->status !!}</p>
                            </td>
                          </tr>
                          @empty
                              
                          @endforelse
                          
                          
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="col-xl-12 box-col-6 des-xl-50">
            <div class="card trasaction-sec">
              <div class="card-header">
                <div class="header-top d-sm-flex align-items-center">
                  <h5>Growth Update</h5>
                  <div class="setting-list">
                    <ul class="list-unstyled setting-option">
                      <li>
                        <div class="setting-secondary"><i class="icon-settings">                                      </i></div>
                      </li>
                      <li><i class="icofont icofont-maximize full-card font-secondary"></i></li>
                      <li><i class="icofont icofont-minus minimize-card font-secondary"></i></li>
                      <li><i class="icofont icofont-refresh reload-card font-secondary"></i></li>
                      <li><i class="icofont icofont-error close-card font-secondary"></i></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div style="display:flex;flex-direction:row;justify-content:space-evenly">

                <div class="transaction-totalbal">
                  <h2> {!! $balance !!} </h2>
                  <p>Total Balance</p>
                </div>
  
                <div class="transaction-totalbal">
                  <h2> {!! $orders !!}</h2>
                  <p>Total Orders</p>
                </div>
  
                <div class="transaction-totalbal">
                  <h2>{!! $products !!}</h2>
                  <p>Total Products</p>
                </div>

                <div class="transaction-totalbal">
                  <h2> {!! (json_decode($pageVisitors->meta))->visits !!}</h2>
                  <p>Total Visitors</p>
                </div>

                <div class="transaction-totalbal">
                  <h2>{!! $carts !!}</h2>
                  <p>Total Carts</p>
                </div>

                <div class="transaction-totalbal">
                  <h2>{!! $users !!}</h2>
                  <p>Registered Users</p>
                </div>

              </div>

            </div>
          </div>
          
        </div>
     
        <div class="col-xl-12 des-xl-100 top-dealer-sec">
          <div class="card">
            <div class="card-header pb-0">
              <div class="header-top d-sm-flex justify-content-between align-items-center">
                <h5>Most Liked Products</h5>
                <div class="setting-list">
                  <ul class="list-unstyled setting-option">
                    <li>
                        <div class="setting-primary"><i class="icon-settings"></i></div>
                    </li>
                    <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                    <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                    <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                    <li><i class="icofont icofont-error close-card font-primary"> </i></li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="card-body">
              
              <div class="row">

                @forelse ($mostLiked as $item)
                <div class="item col-4">
                  <div class="card">
                    <div class="top-dealerbox text-center">
                      <img class="card-img-top" src="{{$item->product->image}}" alt="...">
                      <h6>{{$item->product->name}}</h6>
                      <p>{{$item->likes}}</p>
                    </div>
                  </div>
                </div>
                @empty
                @endforelse

              </div>

            </div>

          </div>
        </div>
        
      </div>

      <!-- Container-fluid Ends-->
    @push('scripts')
      <script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
      <script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
      <script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
      <script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
      <script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
      <script src="{{asset('assets/js/dashboard/default.js')}}"></script>
      <script src="{{asset('assets/js/notify/index.js')}}"></script>
    @endpush
@endsection
