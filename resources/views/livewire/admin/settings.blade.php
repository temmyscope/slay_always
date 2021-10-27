@section('title', 'MetaData Settings')

<div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Taxes to Add (They would be added to customer's total payment)</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <form>
                        <div class="col-4">
                            <label class="form-label">VAT</label>
                            <div class="input-group">
                                <input class="form-control" wire:model="vat" type="number" placeholder="Percent (Default is 7.5)" />
                                <span class="input-group-text">%</span> 
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Shipping Fee</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">₦</span> 
                                <input class="form-control" wire:model="shipping" type="number" placeholder="Amount (in naira)" />
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Other Taxes: (Leave empty if no other taxes)</label>
                            <div class="input-group">
                                <input class="form-control" type="text" wire:model="other_taxes" placeholder="Percentage Amount" />
                                <span class="input-group-text">%</span> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary m-r-15" type="submit">Save</button>
                <button class="btn btn-light" type="submit">Clear All</button>
            </div>
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
                            <input class="form-control" type="text" placeholder="E.g. Shoes, Blouse & Tops, Shirts, Lingerie" /> &nbsp;
                            <button class="btn btn-primary m-r-15" type="submit">Save</button>
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
                            <input class="form-control" type="text" placeholder="E.g. Blue, Burgundy, Red, etc." /> &nbsp;
                            <button class="btn btn-primary m-r-15" type="submit">Save</button>
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
                            <input class="form-control" type="text" placeholder="E.g. Blue, Burgundy, Red, etc." /> &nbsp;
                            <button class="btn btn-primary m-r-15" type="submit">Save</button>
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
                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Instagram:</label>
                        <div class="input-group">
                            <input class="form-control" type="url" wire:model="instagram" placeholder="E.g. Blue, Burgundy, Red, etc." /> &nbsp;
                            <button class="btn btn-primary m-r-15" type="submit">Save</button>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label">WhatsApp:</label>
                        <div class="input-group">
                            <input class="form-control" type="url" wire:model="whatsapp" placeholder="E.g. Blue, Burgundy, Red, etc." /> &nbsp;
                            <button class="btn btn-primary m-r-15" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>    
</div>