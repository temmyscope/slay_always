@extends('layouts.admin.master')

@section('title', 'Email Composer')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dropzone.css')}}">
@endpush

@section('content')
	
	{!! "<!-- this would be to send newsletters to multiple people -->" !!}
	
	<div class="container-fluid">
	    <div class="email-wrap">
	        <div class="row">
	            <div class="col-xl-3 col-md-6 xl-40">
	                <div class="email-sidebar">
	                    <a class="btn btn-primary email-aside-toggle" href="javascript:void(0)">email filter</a>
	                    <div class="email-left-aside">
	                        <div class="card">
	                            <div class="card-body">
	                                <div class="email-app-sidebar">
	                                    <div class="media">
	                                        <div class="media-size-email"><img class="me-3 rounded-circle" src="{{asset('assets/images/user/user.png')}}" alt="" /></div>
	                                        <div class="media-body">
	                                            <h6 class="f-w-600">MARKJENCO</h6>
	                                            <p>Markjecno@gmail.com</p>
	                                        </div>
	                                    </div>
	                                    <ul class="nav main-menu" role="tablist">
	                                        <li class="nav-item">
	                                            <a class="btn-primary btn-block btn-mail" id="pills-darkhome-tab" data-bs-toggle="pill">
																								<i class="icofont icofont-envelope me-2"></i>Contact Us Message
																							</a>
	                                        </li>
																					{!! "<!-- contact us message -->" !!}
	                                        
	                                    </ul>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xl-9 col-md-12 xl-60">
	                <div class="email-right-aside">
	                    <div class="card email-body">
	                        <div class="email-profile">
	                            <div class="email-body">
	                                <div class="email-compose">
	                                    <div class="email-top compose-border">
	                                        <div class="compose-header">
	                                            <h4 class="mb-0">New Message</h4>
	                                            <button class="btn btn-primary" type="button"><i class="fa fa-file me-2"></i> save</button>
	                                        </div>
	                                    </div>
	                                    <div class="email-wrapper">
	                                        <form class="theme-form">
	                                            <div class="form-group">
	                                                <label class="col-form-label pt-0" for="exampleInputEmail1">To</label>
	                                                <input class="form-control" id="exampleInputEmail1" type="email" />
	                                            </div>
	                                            <div class="form-group">
	                                                <label for="exampleInputPassword1">Subject</label>
	                                                <input class="form-control" id="exampleInputPassword1" type="text" />
	                                            </div>
	                                            <div class="form-group">
	                                                <label>Message</label>
	                                                <textarea id="text-box" name="text-box" cols="10" rows="2"> </textarea>
	                                            </div>
	                                        </form>
	                                        <div class="action-wrapper">
	                                            <ul class="actions">
                                                    <li>
                                                            <a class="btn btn-secondary" href="javascript:void(0)"><i class="fa fa-paper-plane me-2"></i>send </a>
                                                    </li>
	                                            </ul>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	
	@push('scripts')
	<script src="{{asset('assets/js/editor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script>
    <script src="{{asset('assets/js/email-app.js')}}"></script>
	@endpush

@endsection