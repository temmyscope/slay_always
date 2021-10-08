@extends('layouts.admin.master')

@section('title', 'NewsLetter Editor')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/simple-mde.css')}}">
@endpush

@section('content')
	
	<div class="container-fluid">
		<div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>MarkDown Editor</h5>
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