@section('title', 'Edit Profile')
@section('description', 'Welcome to StaySlay - Fashion. Profile')
@section('keywords', 'Stay, Slay, Fashion')

<div>
    <nav class="w-full">
        <div class="lg:w-3/4 flex mx-auto justify-between bg-white items-center h-auto p-1">
          <ul class="flex">
            <li class="underline p-3 font-bold text-xl">
              <a href="{!! route('home') !!}">Home</a>
            </li>
            <li class="p-3 text-gray-400 text-xl">
              <a>Delivery Address</a>
            </li>
          </ul>
        </div>
      </nav>
    
    <main class="w-full mt-16 mb-4 overflow-x-auto lg:overflow-hidden flex">
        <div class="lg:w-3/4 mx-auto flex gap-6 min-w-full">

            @includeIf('layouts.sidebar', ['active' => 'profile'])
        
            <div class="bg-white rounded-md min-w-profie flex-shrink-0">
                <div class="p-3 border-b-2 border-gray-200 border-solid w-full">
                    <h3 class="capitalize text-xl">Delivery Address</h3>
                </div>
            
                <div class="grid lg:grid-cols-2 gap-6 p-3 w-full">

                    <div class="py-2">
                        <label for="country" class="w-full block mb-4">Please select your country</label>
                        <select 
                            wire:model="country" name="country" id="country" 
                            class="w-9/12 text-gray-800 input-bod py-1 focus:ring-0 focus:outline-none  px-2"
                        >
                            <option value="male">Please select one</option>
                            @foreach ($countries as $country)
                                <option value="{!! $country !!}">{!! $country !!}</option>
                            @endforeach
                        </select>
                        <a href="" wire:click="saveCountry" class="text-slayText font-bold">
                            Save<span wire:loading wire:target="saveCountry"><i class="fa fa-spinner faa-spin animated"></i></span>
                        </a>
                    </div>

                    <div class="py-2">
                        <label for="state" class="w-full block mb-3">State</label>
                        <span>
                            <input 
                                type="text" name="state" id="state" placeholder="enter your state" wire:model="state"
                                class="w-9/12 py-1 input-bod focus:ring-0 focus:outline-none  px-2"
                            />
                            <a href="" wire:click="saveState" class="text-slayText font-bold">
                                Save<span wire:loading wire:target="saveState"><i class="fa fa-spinner faa-spin animated"></i></span>
                            </a>
                        </span>
                    </div>

                    <div class="py-2">
                        <label for="zip" class="w-full block">Zip code</label>
                        <span>
                            <input 
                                type="text" name="zip" id="zip"  pattern="[0-9]{5}" placeholder="enter your zip code" 
                                class="w-9/12 py-1 input-bod focus:ring-0 focus:outline-none  px-2" wire:model="zip_code"
                            />
                            <a href="" wire:click="saveZip" class="text-slayText font-bold">
                                Save<span wire:loading wire:target="saveZip"><i class="fa fa-spinner faa-spin animated"></i></span>
                            </a>
                        </span>
                    </div>

                    <div class="py-2">
                        <label for="residential" class="w-full block">Residential Address</label>
                        <span>
                            <textarea 
                                name="residential" id="residential" cols="30" rows="2" wire:model="address"
                                class="w-9/12 py-1 input-bod focus:ring-0 focus:outline-none  px-2"
                            >
                            </textarea>
                            <a href="" wire:click="saveAddress" class="text-slayText font-bold">
                                Save
                                <span wire:loading wire:target="saveAddress"><i class="fa fa-spinner faa-spin animated"></i></span>
                            </a>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </main>
  
</div>