@section('title', 'Announcement')
<div>
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-sm-12">
	            <div class="card">
                    <div class="card-header pb-0">
                        <h5> Short Announcement: (Announcements last for 2 weeks)</h5>
                    </div>
	                <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Enter Announcement Note</label>
                                    <textarea wire:model.defer="note" class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="text-end">
                                    <button class="btn btn-secondary me-3 sweet-8" type="submit">
                                        Add
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
