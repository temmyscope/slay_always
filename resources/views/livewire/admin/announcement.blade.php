@section('title', 'Announcement')
<div>
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-sm-12">
	            <div class="card">
                    <div class="card-header pb-0" style="display:flex;justify-content:space-between;align-items:center;">
                        <h5> Short Announcement</h5>
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
                                <input wire:model="expiry" type="date" class="form-control" style="max-width: 250px" />
                                @error('expiry') <span class="alert-danger">{{ $message }}</span> @enderror

                                <div class="text-end mr-4">
                                    <button class="btn btn-secondary me-3 sweet-8" type="submit" wire:click="save">
                                        Publish
                                        <span wire:loading wire:target="save"><i class="fa fa-spinner faa-spin animated"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
