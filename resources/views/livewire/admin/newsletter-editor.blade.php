@section('title', 'NewsLetter Editor')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dropzone.css')}}">
@endpush

<div>

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
																						<h6 class="f-w-600">NewsLetter Type</h6>
																						<p>Admin Newsletter Center</p>
																				</div>
																		</div>
																		<ul class="nav main-menu" role="tablist">
																			<li class="nav-item">
																				<a  wire:click="changeNewsType('email')" class="btn-primary btn-block btn-mail" id="pills-darkhome" data-bs-toggle="pill" href="#pills-darkhome" style="display: flex;justify-content: space-between">
																					<span><i class="icofont icofont-envelope me-2"></i>MAIL</span>

																					@if($newsType === 'email')
																						<i class="icofont icofont-star me-2"></i>
																					@endif
																				</a>
																				
																			</li>

																			<li class="nav-item">
																				<a wire:click="changeNewsType('push')" class="btn-primary btn-block btn-mail" id="pills-darkhome-push" data-bs-toggle="pill" href="#pills-darkhome-push" style="display: flex;justify-content: space-between">
																					<span><i class="icofont icofont-envelope me-2"></i>PUSH NOTIFICATION</span>

																					@if($newsType === 'push')
																						<i  class="icofont icofont-star me-2"></i>
																					@endif
																				</a>
																			</li>

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
																				</div>
																		</div>
																		<div class="email-wrapper">
																				<form class="theme-form">
																						<div class="form-group">
																								<div class="form-group m-t-10 m-checkbox-inline mb-1 custom-radio-ml">
																									<label class="col-form-label pt-0" for="exampleInputEmail1">To: </label>

																									<div class="radio radio-primary">
																									@if($recipient !== null)
																									<input id="radioinline1" type="radio" name="radio1" value="option1" checked>
																									@endif

																									<label class="mb-0" for="radioinline1">Specific User</label>
																									</div>
																									<div class="radio radio-primary">
																									<input id="radioinline2" type="radio" name="radio1" value="option1">
																									<label class="mb-0" for="radioinline2">All Users</label>
																									</div>
																									<div class="radio radio-primary">
																									<input id="radioinline3" type="radio" name="radio1" value="option1">
																									<label class="mb-0" for="radioinline3">Option<span class="digits"> 3</span></label>
																									</div>
																								</div>
																								@if($recipient !== null)
																								<input class="form-control" id="exampleInputEmail1" type="email" />
																								@endif
																						</div>
																						<div class="form-group">
																								<label for="exampleInputPassword1">Subject</label>
																								<input class="form-control" id="exampleInputPassword1" type="text" />
																						</div>
																						<div class="form-group">
																								<label>Message</label>
																								<textarea class="form-control" id="text-box" name="text-box" cols="20" rows="4"> </textarea>
																						</div>

																						@if($newsType === 'email')
																						<div class="form-group">
																							<div class="dropzone digits text-center" id="singleFileUpload" action="/upload.php">
																								<div class="dz-message needsclick">
																									<i class="icon-cloud-up"></i>
																									<h6>Drop files here or click to upload.</h6>
																									<span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
																								</div>
																							</div>
																						</div>
																						@endif
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
@push('script')
<script src="{{asset('assets/js/editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/js/editor/ckeditor/adapters/jquery.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script>
<script src="{{asset('assets/js/email-app.js')}}"></script>
@endpush
</div>