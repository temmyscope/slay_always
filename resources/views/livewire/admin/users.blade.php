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
						<div class="ribbon ribbon-primary ribbon-space-bottom" style="color: white;">{!! $user->acl !!}</div>
						<div class="card-profile"><img class="rounded-circle" src="{!! asset('assets/images/dashboard/1.png') !!}" alt="" /></div>

						@if ($user->acl === 'admin' && $user->id < 5)
								
						@else
						<div style="display:flex;flex-direction:row;justify-content:space-evenly; align-items:center;">
							Change Role:
							<button class="badge rounded-pill badge-info" wire:click="updateRole({!! $user->id !!}, 'user')">
								Customer
								@if($user->acl === 'customer')
									<i class="icofont icofont-star me-2"></i>
								@endif
							</button>
							<button class="badge rounded-pill badge-danger sweet-11" wire:click="updateRole({!! $user->id !!}, 'admin')">
								Admin
								@if($user->acl === 'admin')
									<i class="icofont icofont-star me-2"></i>
								@endif
							</button>
						</div>
						@endif

						<ul class="card-social">
							<li>
									<a href="{!! route('editor', ['user' => $user->id]) !!}"><i class="fa fa-envelope"></i></a>
							</li>
							<li>
								<a href="{!! route('chat', ['id' => $user->id])!!}"><i class="fa fa-comments"></i></a>
							</li>
						</ul>
						<div class="text-center profile-details">
							<a href="#"> <h4>{!! $user->name !!}</h4></a>
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