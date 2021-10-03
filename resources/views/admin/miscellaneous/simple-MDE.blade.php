@extends('layouts.admin.master')

@section('title')MDE Editor
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/simple-mde.css')}}">
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>MDE Editor</h3>
		@endslot
		<li class="breadcrumb-item">Editor</li>
		<li class="breadcrumb-item active">MDE Editor</li>
	@endcomponent
	
	<div class="container-fluid">
		<div class="row">
				<div class="col-sm-12">
						<div class="card">
								<div class="card-header pb-0">
										<h5>Second Example</h5>
								</div>
								<div class="card-body">
										<div class="row">
												<div class="col-md-6">
														<textarea class="CodeMirror" id="smde"></textarea>
												</div>
												<div class="col-md-6 reader" id="write_here"></div>
										</div>
								</div>
						</div>
				</div>
		</div>
	</div>

	
	@push('scripts')
	<script src="{{asset('assets/js/editor/simple-mde/simplemde.min.js')}}"></script>
    <script src="{{asset('assets/js/editor/simple-mde/simplemde.custom.js')}}"></script>
	@endpush

@endsection