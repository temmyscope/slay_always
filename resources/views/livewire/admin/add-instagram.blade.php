@section('title', 'Add Instagram Images')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dropzone.css')}}">
@endpush

<div>	
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-sm-12">
	            <div class="card">
                    <div class="card-header pb-3" style="display: flex;justify-content:space-evenly;align-items:center;">
                        <h5> Instagram Gallery </h5>

                        <div class="col ">
                            <div class="text-end">
                                @if ($formVisibility !== true)
                                <a class="btn btn-secondary me-3" wire:click="unhideForm">
                                    Add Item
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

                            <div class="col">
                                <div class="mb-3">
                                    <label>Instagram Link</label>
                                    <input 
                                        class="form-control" wire:model="link" 
                                        type="url" placeholder="Enter The link to the post" 
                                    />@error('link') <span class="alert-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Upload Image From Instagram Post</label>
                                    <div class="dropzone dz-message" 
                                        style="display:flex;justify-content:center;align-items:stretch;cursor: pointer;"
                                        onclick="document.getElementById('instagram-image').click()"
                                    >
                                        <h6>Click to upload.</h6>
                                        @error('image') <span class="error">{{ $message }}</span> @enderror
                                        @if ($image && !empty($image))
                                            <div style="display: flex;justify-content:space-between;align-items:flex-end;">
                                                <img src="{!! $image->temporaryUrl() !!}" style="width:100px;height:80px;object-fit:contain;" />
                                            </div>
                                        @endif
                                    </div>
                                    <input type="file" wire:model="image" style="display: none;" id="instagram-image" />

                                    <span wire:loading wire:target="upload">
                                        <i class="fa fa-spinner faa-spin animated"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="text-end">
                                    <a class="btn btn-secondary me-3" wire:click="save">
                                        Add To Gallery
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
                                    <th scope="col">Image</th>
                                    <th scope="col">Instagram Link</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if( $instagramPosts && isset($instagramPosts[0]) )
                                @foreach ($instagramPosts as $item)
                                <tr>
                                    <td>
                                        <img 
                                            src="{!! cdnizeURL($item->image->src ?? '') !!}" alt=""
                                            style="width:50px; height:50px;object-fit:contain;"
                                        />
                                    </td>
                                    <td>
                                        <div class="product-name">
                                            <a href="{!! route('promos', [ 'id' => $item->id ]) !!}">
                                                {!! $item->link !!} 
                                            </a>
                                        </div>
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