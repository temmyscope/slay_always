@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/dropzone.css')}}">    
@endpush

<div>
	<div class="container-fluid list-products">    
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label>Upload product images</label>
                    <div class="dropzone dz-message" 
                        style="display:flex;justify-content:center;align-items:stretch;cursor: pointer;"
                        onclick="document.getElementById('product-image').click()"
                    >
                        <h6>Drop files here or click to upload.</h6>
                        @error('photos.*') <span class="error">{{ $message }}</span> @enderror
                        @if ($images && !empty($images))
                            <div style="display: flex;justify-content:space-between;align-items:flex-end;">
                                @foreach ($images as $item)
                                    <img src="{!! $item->temporaryUrl() !!}" style="width:100px;height:80px;object-fit:contain;" />
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <input type="file" wire:model="images" multiple style="display: none;" id="product-image" />
                </div>
            </div>
        </div>
    </div>
</div>
