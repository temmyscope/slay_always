@section('title', 'Admin Chat')

<div>	
	<div class="container-fluid">
	    <div class="row">
	        <div class="col call-chat-sidebar">
	            <div class="card">
	                <div class="card-body chat-body">
	                    <div class="chat-box">
	                        <!-- Chat left side Start-->
	                        <div class="chat-left-aside">

														<div class="media">
															<img class="rounded-circle user-image" src="{!! asset('assets/images/dashboard/1.png') !!}" alt="" />
															<div class="media-body">
																<div class="about">
																	<div class="name f-w-600">{!! auth()->user()->name !!}</div>
																	<div class="status">Admin</div>
																</div>
															</div>
														</div>

														<div class="people-list" id="people-list">
															<div class="search">
																<form class="theme-form">
																	<div class="form-group"><input class="form-control" type="text" placeholder="search" /><i class="fa fa-search"></i></div>
																</form>
															</div>

															<ul class="list custom-scrollbar">
																@forelse ($chatsHistory as $chat)
																<li class="clearfix">
																	<div class="media">
																		<img class="rounded-circle user-image" src="{!! asset('assets/images/user/1.jpg') !!}" alt="" />
																		<div class="media-body">
																			<div class="about">
																				<a class="name" href="{!! route('chat', ['id' => $chat->user->id ]) !!}">
																					{!! $chat->user->name !!}
																				</a>
																			</div>
																		</div>
																	</div>
																</li>
																@empty
																@endforelse

															</ul>
														</div>

	                        </div>
	                        <!-- Chat left side Ends-->
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class="col call-chat-body"  wire:poll.10000ms>
	            <div class="card">
	                <div class="card-body p-0">
	                    <div class="row chat-box">
	                        <!-- Chat right side start-->
	                        <div class="col chat-right-aside">
	                            <!-- chat start-->
	                            <div class="chat">
	                                <!-- chat-header start-->
	                                <div class="media chat-header clearfix">
																			@if (!$chatsHistory->empty())
	                                    <div class="media-body">
																				<div class="about">
																					<div class="name">{!! $chatsHistory->user->name !!}</div>
																				</div>
	                                    </div>
																			@else
																			<div class="media-body">
																				<div class="about">
																					<div class="name">{!! auth()->user()->name !!}</div>
																				</div>
	                                    </div>
																			@endif

	                                </div>
	                                <!-- chat-header end-->
	                                <div class="chat-history chat-msg-box custom-scrollbar">
	                                    <ul>
																				@if (!is_null($chatInFocus) && !$chatInFocus->empty())
																					@foreach ($chatInFocus as $chat)
																						<li class="clearfix">
																							<div class="message {!! ($chat->sender == $userId)? 'other-message pull-right' : 'my-message' !!}">
																								@if ( str_starts_with($chat->msg, "[!image!]:") )
																									<div class="receiver-img">
																										<img src="{!! str_replace('[!image!]:', '', $chat->msg) !!}" alt="" />
																									</div>
																								@else
																									{!! $chat->msg !!}
																								@endif

																								<div class="message-data text-end">
																									<span class="message-data-time">{!! $chat->created_at !!}</span>
																								</div>
																								
																							</div>
																						</li>
																					@endforeach
																				@endif
	                                    </ul>
	                                </div>
	                                <!-- end chat-history-->
	                                <div class="chat-message clearfix">
	                                    <div class="row">
	                                        <div class="col-xl-12 d-flex">
	                                            <div class="smiley-box bg-primary">
																									<button type="file" class="icon-camera" wire:model="image"></button>
	                                            </div>
	                                            <div class="input-group text-box">
	                                                <input 
																										class="form-control input-txt-bx" id="message-to-send" type="text" name="message-to-send" 
																										autofocus placeholder="Type a message......" 
																									/>
	                                                <button class="btn btn-primary input-group-text" wire:click="" type="button">SEND</button>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <!-- end chat-message-->
	                                <!-- chat end-->
	                                <!-- Chat right side ends-->
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
	<script src="{{asset('assets/js/fullscreen.js')}}"></script>
	<script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
 	<script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script>
	@endpush
