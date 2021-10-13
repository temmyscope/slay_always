@extends('layouts.admin.master')

@section('title', 'Users')

@section('content')
	
	<div class="container-fluid user-card">
		<div class="row">

			@forelse ($users as $user)
				<div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
					<div class="card custom-card">
						<div class="card-profile"><img class="rounded-circle" src="{{asset('assets/images/avtar/3.jpg')}}" alt="" /></div>
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

@endsection