@extends('layouts.admin.master')

@section('title', 'Users')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">
@endpush

@section('content')
	
	<div class="container-fluid user-card">
		<div class="row">

			@forelse ($users as $user)
				<div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
					<div class="card custom-card">
						<div class="ribbon ribbon-primary ribbon-space-bottom">{!! $user->role !!}</div>
						<div class="card-profile"><img class="rounded-circle" src="{{asset('assets/images/avtar/3.jpg')}}" alt="" /></div>

						<div style="display:flex;flex-direction:row;justify-content:space-evenly; align-items:center;">
							<p>Change User Role:</p>
							<button class="badge rounded-pill badge-info" wire:click="updateRole({!! $user->id !!}, user)">User</button>
							<button class="badge rounded-pill badge-danger sweet-11" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-11']);">
								Admin
							</button>
						</div>

						<ul class="card-social">
							<li>
									<a href="javascript:void(0)"><i class="fa fa-user"></i></a>
							</li>
							<li>
									<a href="javascript:void(0)"><i class="fa fa-envelope"></i></a>
							</li>
							<li>
									<a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i></a>
							</li>
							<li>
									<a href="javascript:void(0)"><i class="fa fa-instagram"></i></a>
							</li>
							<li>
									<a href="javascript:void(0)"><i class="fa fa-comments"></i></a>
							</li>
						</ul>
						<div class="text-center profile-details">
							<a href="#"> <h4>Mark Jecno</h4></a>
							<h6>Manager</h6>
						</div>
					</div>
				</div>
			@empty
					
			@endforelse
			
		</div>
	</div>

	@push('scripts') 
			<script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
			<script src="{{asset('assets/js/sweet-alert/app.js')}}"></script>
	@endpush

@endsection