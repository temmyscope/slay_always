@section('title', 'Feedback')

<div>
    <style>
    .feedback-card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px; width: 100%;
        margin: auto; text-align: center;
        font-family: arial; max-height: 300px; height: 100%;
    }

    .price {
        color: grey;
        font-size: 14px;
    }

    .feedback-card .tag {
        border: none;
        outline: 0;
        padding: 10px;
        color: white;
        background-color: #000;
        text-align: center;
        font-size: 12px;
    }

    .feedback-card button:hover {
        opacity: 0.7;
    }
    </style>
	<div class="container-fluid">
		<div class="row project-cards">

			<div class="col-md-12 project-list">
                <div class="card">
                    <div class="row">

                        <div class="col-md-6 p-0">
                            <h5 class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                                FeedBacks
                            </h5>
						</div>

                    </div>
                </div>
			</div>

            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">
                        <div class="tab-content" id="top-tabContent">
                            <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                <div class="row" style="display: flex;justify-content:center;align-items:center;">

                                    <div 
                                        class="col-xxl-4 col-lg-6" 
        style="display: flex;justify-content:space-evenly;flex-wrap:wrap;align-items:center;align-content:center;margin:30px;"
                                    >
                                        @if ( !empty($feedbacks) )
                                            @foreach ($feedbacks as $feedback)
                                            <div class="feedback-card" style="margin-bottom: 10px; padding-bottom:10px;">
                                                <h1>{!! $feedback->name !!}</h1>
                                                <p class="price" style="display: flex;justify-content: space-between; margin:10px;">
                                                    <a href="{!! route('editor').'?email='.$feedback->email.'&name='.$feedback->sender_name !!}">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                    @if ( $feedback->responded === 'true' )
                                                    <span class="badge badge-primary">
                                                        Responded
                                                    </span>
                                                    @else
                                                    <span
                                                        wire:click="markAsResponded({!! $feedback->id !!})" 
                                                        class="badge badge-primary" style="cursor: pointer"
                                                    >
                                                        Mark as Responded
                                                        <span wire:loading wire:target="markAsResponded">
                                                            <i class="fa fa-spinner faa-spin animated"></i>
                                                        </span>
                                                    </span>
                                                    @endif
                                                </p>
                                                <p>{!! $feedback->sender_name !!}</p>
                                                <p>{!! $feedback->feedback !!}</p>
                                                <hr>
                                                <p>
                                                    <span class="badge badge-primary tag" style="width: 38%">
                                                        {!! $feedback->type !!}
                                                    </span>
                                                    <span>about<span>
                                                    <span class="badge badge-primary tag" style="width: 38%">
                                                        {!! $feedback->subject !!}
                                                    </span>
                                                </p>
                                            </div>
                                            @endforeach

                                        @endif
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