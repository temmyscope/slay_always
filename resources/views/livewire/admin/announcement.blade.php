@section('title', 'Announcement')
<div>
    @push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endpush
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-sm-12">
	            <div class="card">
                    <div class="card-header pb-0" style="display:flex;justify-content:space-between;align-items:center;">
                        <h5> Short Announcement</h5>
                        
                        <div class="col ">
                            <div class="text-end">
                                <a class="btn btn-secondary me-3" 
                                    wire:click="unhideForm"
                                >
            {!! ($visibility === true) ? 'Hide' : 'Show' !!} Announcements 
                                </a>
                            </div>
                        </div>
                    </div>

	                <div class="card-body">
                        <div class="row">
                            <span class="alert-success">
                            {!! session('message') ?? '' !!}
                            </span>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Enter Announcement Note</label>
                                    <textarea wire:model.defer="note" placeholder="Keep It Short and Simple"
                                        class="form-control" id="exampleFormControlTextarea4" rows="3"
                                    ></textarea>
                                </div>
                                @error('note') <span class="alert-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Announcement Expiry</label>
                                <input wire:model="expiry" type="datetime-local" class="form-control" style="max-width: 250px" />
                                @error('expiry') <span class="alert-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="col">
                                <label>
                                    Click on the checkbox to show on Pop-up
                                </label><br/>
                                <input 
                                wire:model="isAnnouncement" 
                                type="checkbox" value="true" 
                                />
                            </div>

                                <div class="text-end mr-4">
                                    <button class="btn btn-secondary me-3 sweet-8" type="submit" wire:click="save">
                                        Publish
                                        <span wire:loading wire:target="save"><i class="fa fa-spinner faa-spin animated"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        @if( $visibility === true )
                        <div class="data-table table-responsive">
                            <table class="table table-bordernone display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th scope="col">Announcement</th>
                                        <th scope="col">Expires On</th>
                                        <th scope="col">Show On Pop-up</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if( $notes && isset($notes[0]) )
                                    @foreach ($notes as $item)
                                    <tr>
                                        <td>
                                            <span>
                                            {!! $item->note !!}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="product-name">
                                            <span>
                {!!  date('g:i a, l M jS, Y', strtotime($item->active_at)) !!} 
                                            </span>
                                            </div>
                                        </td>
                                        <td>
                                            <span>
                {!! $item->is_modal === 'false' ? 'No' : 'Yes' !!}
                                            </span>
                                        </td>
                                        <td>
                <a class="btn btn-secondary me-3" wire:click="delete({!! $item->id!!})"> Delete
                <span wire:loading wire:target="delete">
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
