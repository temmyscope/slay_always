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
																					<i class="icofont icofont-star me-2"></i>
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
																				<form class="theme-form" wire:submit.prevent="send">
																						<div class="form-group">
																								<div class="form-group m-t-10 m-checkbox-inline mb-1 custom-radio-ml">
																									<label class="col-form-label pt-0" for="exampleInputEmail1">To: </label>

																									<div class="radio radio-primary">
																										<input 
																											id="radioinline1" type="radio" name="radio1" value="option1" 
																											{!! ($recipient !== null)? 'checked' : '' !!}
																										>
																										<label class="mb-0" for="radioinline1">Specific User</label>
																									</div>
																									<div class="radio radio-primary">
																										<input id="radioinline2" type="radio" name="radio1" value="option1">
																										<label class="mb-0" for="radioinline2">All Users</label>
																									</div>

																								</div>
																								@if($recipient === null)
																								<input class="form-control" id="exampleInputEmail1" type="email" />
																								@endif
																						</div>
																						<div class="form-group">
																								<label for="exampleInputPassword1">Subject</label>
																								<input class="form-control" id="exampleInputPassword1" wire:model="title" type="text" />
																						</div>
																						<div class="form-group">
																								<label>Message</label>
																								<textarea class="form-control" id="text-box" name="text-box" cols="20" wire:model="news" rows="4">
																								</textarea>
																						</div>
																						
																				</form>
																				<div class="action-wrapper">
																						<ul class="actions">
																								<li>
																									<button class="btn btn-secondary" type="submit">
																										<i class="fa fa-paper-plane me-2"></i>send 
																										<span wire:loading wire:target="save"><i class="fa fa-spinner faa-spin animated"></i></span>
																									</button>
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