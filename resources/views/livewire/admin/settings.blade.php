@section('title', 'MetaData Settings')

<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Taxes to Add <span>(They would be added to customer's total payment)</span></h5>
                </div>

                <form wire:submit.prevent="saveTaxes">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label">VAT</label>
                                <div class="input-group">
                                    <input 
                                        class="form-control" wire:model="vat" type="text" 
                                        placeholder="Percent (Default is 7.5)" 
                                    />
                                    <span class="input-group-text">%</span> 
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Shipping Fee</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">₦</span> 
                                    <input 
                                        class="form-control" wire:model="shipping" 
                                        type="text" placeholder="Amount (in naira)" 
                                    />
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Other Taxes: (Leave empty if none)</label>
                                <div class="input-group">
                                    <input 
                                        class="form-control" type="text" wire:model="other_taxes" 
                                        placeholder="Percentage Amount" 
                                    />
                                    <span class="input-group-text">%</span> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary m-r-15" type="submit">
                            Save
                            <span wire:loading wire:target="saveTaxes"><i class="fa fa-spinner faa-spin animated"></i></span>
                        </button>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header pb-0">
                    <h5>Add Product Categories</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Category Names: (Use comma to separate the categories)</label>
                            <div class="input-group">
                                <input wire:model="categories" class="form-control" type="text" placeholder="E.g. Shoes, Blouse & Tops, Shirts, Lingerie" /> &nbsp;
                                <button wire:click="saveMeta('categories')" class="btn btn-primary m-r-15" type="submit">
                                    Save
                                    <span wire:loading wire:target="saveMeta"><i class="fa fa-spinner faa-spin animated"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header pb-0">
                    <h5>Add Available Product Colors</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Colors: (Use comma to separate the colors)</label>
                            <div class="input-group">
                                <input wire:model="colors" class="form-control" type="text" placeholder="E.g. Blue, Burgundy, Red, etc." /> &nbsp;
                                <button wire:click="saveMeta('colors')" class="btn btn-primary m-r-15" type="submit">
                                    Save
                                    <span wire:loading wire:target="saveMeta"><i class="fa fa-spinner faa-spin animated"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header pb-0">
                    <h5>Add Available Product Sizes</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Sizes: (Use comma to separate the sizes)</label>
                            <div class="input-group">
                                <input wire:model="sizes" class="form-control" type="text" placeholder="E.g. XL, L, S, M etc." /> &nbsp;
                                <button wire:click="saveMeta('sizes')" class="btn btn-primary m-r-15" type="submit">
                                    Save
                                    <span wire:loading wire:target="saveMeta"><i class="fa fa-spinner faa-spin animated"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header pb-0">
                    <h5>Add Available Social Links:</h5><span>(If it's not available, leave empty)</span>
                </div>

                <div class="card-body">
                    <form wire:submit.prevent="saveSocials">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Instagram:</label>
                            <div class="input-group">
                                <input class="form-control" type="text" wire:model="instagram" placeholder="E.g. stay_slay" /> 
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label">WhatsApp:</label>
                            <div class="input-group">
                                <input class="form-control" type="tel" wire:model="whatsapp" placeholder="E.g. +2340000" />
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary m-r-15" type="submit">
                            Save
                            <span wire:loading wire:target="saveSocials"><i class="fa fa-spinner faa-spin animated"></i></span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>    
</div>