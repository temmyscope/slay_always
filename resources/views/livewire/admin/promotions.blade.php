@section('title', 'Create Coupon')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/date-picker.css') }}">
@endpush

<div>	
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-sm-12">
	            <div class="card">
                    <div class="card-header pb-3" style="display: flex;justify-content:space-evenly;align-items:center;">
                        <h5> Promotion </h5>

                        <div class="col ">
                            <div class="text-end">
                                @if ($formVisibility !== true)
                                <a class="btn btn-secondary me-3" wire:click="unhideForm">
                                    Create Promotion
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display: flex;justify-content:center">
                        <span class="alert-success" style="width: 80%; text-align:center;">
                        {!! session('message') ?? '' !!}
                        </span>
                    </div>

                    <div class="card-body">
                    @if ($formVisibility)
                    <div class="form theme-form">
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Coupon Name</label>
                                    <input 
                                        class="form-control" wire:model="name" 
                                        type="text" placeholder="Enter Coupon Name" 
                                    />@error('email') <span class="alert-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Coupon Code(#)</label>
                                    <div class="input-group">
                                        <input 
                                            wire:model="coupon" class="form-control" 
                                            type="text" placeholder="Enter Coupon Code" 
                                        />
                                        <span wire:click="generateCoupon" style="cursor: pointer" class="input-group-text">
                                            Generate
                                        </span>
                                    </div>
                                    @error('coupon') <span class="alert-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3" style="display: flex;justify-content:space-evenly;flex-wrap:wrap;">
                                    <div style="width: 45%;">
                                        <label>Start Date</label>
                                        <input 
                                            class="datepicker-here form-control digits" placeholder="E.g. 07/12/2021"
                                            wire:model="start_date" type="date" 
                                        />
                                    </div>
                                    <div style="width: 45%;">
                                        <label>End Date</label>
                                        <input 
                                            class="datepicker-here form-control digits" placeholder="E.g.08/01/2021"
                                            wire:model="end_date" type="date"
                                        />
                                    </div>
                                    @error('end_date') <span class="alert-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Percentage of Discount(%)</label>
                                    <input 
                                        class="form-control"  wire:model="discount" 
                                        type="text" placeholder="Enter Percentage" 
                                    />
                                </div>@error('discount') <span class="alert-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Enter Promo Description</label>
                                    <textarea  
                                        wire:model="description"  class="form-control" 
                                        id="exampleFormControlTextarea4" rows="3" placeholder="Not required"
                                    >
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="text-end">
                                    <a class="btn btn-secondary me-3" wire:click="save">
                                        Create
                                        <span wire:loading wire:target="save">
                                            <i class="fa fa-spinner faa-spin animated"></i>
                                        </span>
                                    </a>
                                    <a class="btn btn-danger" wire:click="clearInputs" >
                                        Cancel
                                        <span wire:loading wire:target="clearInputs">
                                            <i class="fa fa-spinner faa-spin animated"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endif

                    
                    <div class="data-table table-responsive">
                        <table class="table table-bordernone display" id="basic-1">
                            <thead>
                                <tr>
                                    <th scope="col">Coupon Code.</th>
                                    <th scope="col">Discount (%)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Start date</th>
                                    <th scope="col">End date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if( !empty($promotions) )
                                @foreach ($promotions as $promotion)

                                <tr>
                                    <td>
                                        <div class="product-name">
                                        <a href="{!! route('promos', [ 'id' => $promotion->id ]) !!}">{!! $promotion->coupon !!} </a>
                                        </div>
                                    </td>
                                    <td>
                                        {!! $promotion->discount !!}
                                    </td>
                                    <td>
                                        {!! ($promotion->end_date < date('Y-m-d')) ? 'Stopped OR Ended' : 'Running' !!}
                                    </td>
                                    <td>
                                        <div class="order-process">
                                            <span class="order-process-circle"></span>{!! $promotion->start_date !!}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="order-process">
                                            <span class="order-process-circle"></span>{!! $promotion->end_date !!}
                                        </div>
                                    </td>
                                    <td>
                                        <a 
                                            class="badge badge-secondary" data-bs-toggle="tooltip" 
                                            data-bs-placement="bottom" title="delete coupon"  style="cursor: pointer"
                                            wire:click.prevent="delete({!! $promotion->id !!})"
                                        >
                                            <i  wire:loading.remove wire:target="delete" class="fa fa-trash" style="color: white">
                                            </i>
                                            <span wire:loading wire:target="delete">
                                                <i class="fa fa-spinner faa-spin animated"></i>
                                            </span>
                                        </a>
                                        <a class="badge badge-secondary" data-bs-toggle="tooltip" 
                                            data-bs-placement="bottom" title="edit coupon" href="{!! route('promos', ['id' => $promotion->id ]) !!}">
                                            <i class="fa fa-pencil" style="color: white"></i>
                                        </a>
                                        <a 
                                            class="badge badge-secondary" data-bs-toggle="tooltip" 
                                            data-bs-placement="bottom" title="stop promotion" style="cursor: pointer"
                                            wire:click.prevent="cancel({!! $promotion->id !!})"
                                        >
                                            <i  wire:loading.remove wire:target="cancel" class="fa fa-ban" style="color: white">
                                            </i>
                                            <span wire:loading wire:target="cancel">
                                                <i class="fa fa-spinner faa-spin animated"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
	            
                </div>

	            </div>
	        </div>
	    </div>
	</div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
@endpush