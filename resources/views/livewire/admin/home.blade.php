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
                            <th>Quantity</th>
                            <th>Value</th>
                            <th>Rate</th>
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
                          <tr>
                            <td>
                              <div class="media"><img class="img-fluid rounded-circle" src="{{asset('assets/images/dashboard/product-1.png')}}" alt="" data-original-title="" title="">
                                <div class="media-body"><a href="#"><span>Yellow New Nike shoes</span></a></div>
                              </div>
                            </td>
                            <td>
                              <p>16 August</p>
                            </td>
                            <td>
                              <p>54146</p>
                            </td>
                            <td><img class="img-fluid" src="{{asset('assets/images/dashboard/graph-1.png')}}" alt="" data-original-title="" title=""></td>
                            <td>
                              <p>$210326</p>
                            </td>
                            <td>
                              <p>Done</p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="media"><img class="img-fluid rounded-circle" src="{{asset('assets/images/dashboard/product-2.png')}}" alt="" data-original-title="" title="">
                                <div class="media-body"><a href="#"><span>Sony Brand New Headphone</span></a></div>
                              </div>
                            </td>
                            <td>
                              <p>2 October</p>
                            </td>
                            <td>
                              <p>32015</p>
                            </td>
                            <td><img class="img-fluid" src="{{asset('assets/images/dashboard/graph-2.png')}}" alt="" data-original-title="" title=""></td>
                            <td>
                              <p>$548526</p>
                            </td>
                            <td>
                              <p>Done</p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="media"><img class="img-fluid rounded-circle" src="{{asset('assets/images/dashboard/product-3.png')}}" alt="" data-original-title="" title="">
                                <div class="media-body"><a href="#"><span>Beautiful Golden Tree plant</span></a></div>
                              </div>
                            </td>
                            <td>
                              <p>21 March</p>
                            </td>
                            <td>
                              <p>12548</p>
                            </td>
                            <td><img class="img-fluid" src="{{asset('assets/images/dashboard/graph-3.png')}}" alt="" data-original-title="" title=""></td>
                            <td>
                              <p>$589565</p>
                            </td>
                            <td>
                              <p>Done</p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="media"><img class="img-fluid rounded-circle" src="{{asset('assets/images/dashboard/product-4.png')}}" alt="" data-original-title="" title="">
                                <div class="media-body"><a href="#"><span>Marco M Kely Handbeg</span></a></div>
                              </div>
                            </td>
                            <td>
                              <p>31 December</p>
                            </td>
                            <td>
                              <p>15495</p>
                            </td>
                            <td><img class="img-fluid" src="{{asset('assets/images/dashboard/graph-4.png')}}" alt="" data-original-title="" title=""></td>
                            <td>
                              <p>$125424 </p>
                            </td>
                            <td>
                              <p>Done</p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="media"><img class="img-fluid rounded-circle" src="{{asset('assets/images/dashboard/product-5.png')}}" alt="" data-original-title="" title="">
                                <div class="media-body"><a href="#"><span>Being Human Branded T-Shirt                                                    </span></a></div>
                              </div>
                            </td>
                            <td>
                              <p>26 January</p>
                            </td>
                            <td>
                              <p>56625</p>
                            </td>
                            <td><img class="img-fluid" src="{{asset('assets/images/dashboard/graph-5.png')}}" alt="" data-original-title="" title=""></td>
                            <td>
                              <p>$112103</p>
                            </td>
                            <td>
                              <p>Done</p>
                            </td>
                          </tr>
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
                  <h2> {!! $pageVisitors !!}</h2>
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
                <div class="item col-4">
                  <div class="card">
                    <div class="top-dealerbox text-center">
                      <img class="card-img-top" src="{{asset('assets/images/dashboard-2/1.png')}}" alt="...">
                      <h6>Thompson lee</h6>
                      <p>Malasiya</p>
                    </div>
                  </div>
                </div>

                <div class="item col-4">
                  <div class="card">
                    <div class="top-dealerbox text-center">
                      <img class="card-img-top" src="{{asset('assets/images/dashboard-2/1.png')}}" alt="...">
                      <h6>Thompson lee</h6>
                      <p>Malasiya</p>
                    </div>
                  </div>
                </div>

                <div class="item col-4">
                  <div class="card">
                    <div class="top-dealerbox text-center">
                      <img class="card-img-top" src="{{asset('assets/images/dashboard-2/1.png')}}" alt="...">
                      <h6>Thompson lee</h6>
                      <p>Malasiya</p>
                    </div>
                  </div>
                </div>
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
