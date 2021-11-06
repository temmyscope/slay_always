@section('title', 'Scripts')

<div>
    @push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <style>
        .ace-monokai {background-color: #272822;color: #F8F8F2}
    </style>
    @endpush

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header" style="display:flex;justify-content:space-between;align-items:center;">
                    <h5>All Available Scripts</h5>
                    <button
                        wire:click="switchVisibility" type="button"
                        class="btn btn-success  btn-xs" 
                        data-original-title="btn btn-success btn-xs"
                    >  Show Product
                        <span wire:loading wire:target="switchVisibility">
                            <i class="fa fa-spinner faa-spin animated"></i>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card-body">
            <textarea wire:model="snippet" class="ace-editor ace-monokai ace-cursor ace_gutter" id="editor">
            </textarea>
        </div>
        <div class="card-footer">
            <div class="col-sm-12">
                <h5>Script Position</h5>
            </div>
            <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                <div class="radio radio-primary">
                <input id="radioinline1" type="radio" name="radio1" value="head" wire:model="position">
                <label class="mb-0" for="radioinline1">Head</label>
                </div>
                <div class="radio radio-primary">
                <input id="radioinline2" type="radio" name="radio1" value="foot" wire:model="position">
                <label class="mb-0" for="radioinline2">Footer</label>
                </div>
            </div>
            <div class="text-end">
                <button wire:click="saveCode" class="btn btn-secondary me-3 sweet-8" type="submit">
                    Save Code Snippet
                    <span wire:loading wire:target="saveCode"><i class="fa fa-spinner faa-spin animated"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="col-xl-12 des-xl-50 yearly-growth-sec">
        @forelse ($scripts as $item)
            <div class="card">
                <div class="card-header">
                    <div class="header-top d-sm-flex justify-content-between align-items-center">
                        <h5>Script: {!! $item->script_id !!}</h5>
                        <div class="setting-list">
                            <ul class="list-unstyled setting-option">
                                <li>
                                    <div class="setting-primary"><i class="icon-settings"></i></div>
                                </li>
                                <li>
                                    <a href="{!! route('scripts', ['id' => $item->id ]) !!}" class="view-html fa fa-code font-primary"></a>
                                </li>
                                <li><i class="icofont icofont-maximize full-card font-primary"></i></li>>
                                <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                                <li>
                                    <a class="icofont icofont-trash close-card font-primary" wire:click.prevent="delete({!!$item->id!!})">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @empty

        @endforelse
        </div>
    </div>


    @push('scripts')
        <script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
        <script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
        <script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
        <script src="{{asset('assets/js/dashboard/dashboard_2.js')}}"></script>
    @endpush
</div>