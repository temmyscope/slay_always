@section('title', 'NewsLetter Editor')



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
																				
																				@php
																						$upperLimit = $newsLetterIndex + 4;
																				@endphp

																				@for ($i = $newsLetterIndex; $i < $upperLimit; $i++)
																				<li class="nav-item mb-2" style="display:flex;flex-direction:column;justify-content:space-between;align-items:space-between;">
																					@if (isset($pastNewsLetters[$i]))
																					<p style="align-self: flex-start; margin:2px">
																					{!! substr($pastNewsLetters[$i]->title, 0, 50) !!}
																					</p>
																					<p style="align-self: flex-end">
																					{!! date('g:i a, l M jS, Y', strtotime($pastNewsLetters[$i]->created_at) ) !!}
																					</p>
																					@endif
																				</li>
																				@endfor

																				<li style="display:flex;justify-content: space-between;">
																				@if (!empty($pastNewsLetters[$newsLetterIndex]))
																				<a  
																					wire:click.prevent="previous" class="btn-primary btn-block btn-mail" 
																					data-bs-toggle="pill" style="display: flex;justify-content: space-between; cursor: pointer;"
																				>
																					Prev
																				</a>
																				<a  
																					wire:click.prevent="next" class="btn-primary btn-block btn-mail" data-bs-toggle="pill" 
																					style="display: flex;justify-content: space-between; cursor: pointer;"
																				>
																					Next
																				</a>
																				@else
																				@endif
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
																							<span class="text-right" style="color: red">
																								{!! session('message') ?? '' !!}
																							</span>
																					</div>
																			</div>
																			<div class="email-wrapper">
																				<form class="theme-form" wire:submit.prevent="send">
																					<div class="form-group">
																							<div class="form-group m-t-10 m-checkbox-inline mb-1 custom-radio-ml">
																								<label class="col-form-label pt-0" for="exampleInputEmail1">To: </label>

																								<div class="radio radio-primary">
																									<input 
																										id="radioinline1" type="radio" name="radio1" value="specific" 
																										wire:model="group" {!! ($recipient !== null)? 'checked' : '' !!}
																									>
																									<label class="mb-0" for="radioinline1">Specific User</label>
																								</div>
																								<div class="radio radio-primary">
																									<input id="radioinline2" type="radio" wire:model="group" name="radio1" value="all" />
																									<label class="mb-0" for="radioinline2">All Users</label>
																								</div>

																							</div>
																							@if($group !== 'all')
																								@if (!is_null($recipient) && is_numeric($recipient))
																									<label class="mb-0" for="radioinline2">Recipient Email</label>
																									<input class="form-control" id="exampleInputEmail1" wire:model="email" type="email" disabled />
																								@else
																								<label class="mb-0" for="radioinline2">Recipient Email</label>
																									<input class="form-control" wire:model="email" id="exampleInputEmail1" type="email" />
																								@endif
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
																					
																					<div class="action-wrapper">
																							<ul class="actions">
																									<li>
																										<button class="btn btn-secondary" type="submit">
																											<i class="fa fa-paper-plane me-2"></i>send 
																											<span wire:loading wire:target="send">
																												<i class="fa fa-spinner faa-spin animated"></i>
																											</span>
																										</button>
																									</li>
																							</ul>
																					</div>
																					
																				</form>
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
	<script src="{{asset('assets/js/editor/ckeditor/adapters/jquery.js')}}"></script>
	<script src="{{asset('assets/js/email-app.js')}}"></script>
	@endpush
</div>