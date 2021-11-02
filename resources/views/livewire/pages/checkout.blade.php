@section('title', 'Checkout')
@section('description', 'Welcome to StaySlay - Fashion. Checkout')
@section('keywords', 'Stay, Slay, Fashion')

<div>
    <nav class="w-full">
        <div class="lg:w-3/4 flex mx-auto justify-between bg-white items-center h-auto p-1">
            <ul class="flex">
                <li class="underline p-3 font-bold text-xl">
                    <a href="{!! route('home') !!}">Home</a>
                </li>
                <li class="p-3 text-gray-400 text-xl">
                    <a>Profile</a>
                </li>
            </ul>
    
            <div class="flex items-center p-1">
                <p class="px-2 text-2xl">Hello</p>
                <div class="py-4 px-4 rounded-full bg-bgSec text-gray-200 text-center">
                <p class="uppercase text-2xl">sd</p>
                </div>
            </div>
    
        </div>
    </nav>

    <main class="w-full mt-16 overflow-x-scroll lg:overflow-hidden flex">
        <div class="lg:w-3/4 mx-auto flex gap-6 min-w-full">
  
            @includeIf('layouts.sidebar', ['active' => 'orders'])

            <!-- payWithPaystack() on payment button -->
            <div class="bg-white rounded-md min-w-profie flex-shrink-0">
                <div class="p-3 border-b-2 border-gray-200 border-solid w-full flex items-center">
                    <a href="" onclick="window.history.back();" class="px-2 text-xl">
                        <span class="fas fa-arrow-left"></span>
                    </a>
                    <h3 class="capitalize text-2xl">Orders details</h3>
                </div>

                <div class=" p-3 w-full">
      
                    <div class="my-7 border-2 border-solid border-gray-200 rounded-lg w-full py-2 p-1">
                        <h2 class="font-bold text-xl">Items in cart</h2>
                    </div>
      
                    <div class="border-2 border-solid border-gray-200 rounded-lg">

                        @foreach ($orderItems=[0,1,2,3] as $item)
                        <div class="p-3  grid grid-cols-9 gap-3 w-full">
                            <div class="col-span-1 p-1 img-width">
                                <img src="https://images.pexels.com/photos/1485031/pexels-photo-1485031.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="" class="">
                            </div>
                            <div class="col-span-8 leading-7">
                                <p class="font-semibold capitalize">
                                    Watches Men Luxury Brand Digital LED Display
                                </p>
                                <p class="font-semibold text-gray-500">
                                    order AK4767890
                                </p>
                                <p class="font-semibold text-gray-500">
                                    Qty: 2
                                </p>
                                <p class="font-semibold text-gray-500">
                                    Size: XL
                                </p>
                                <p class="font-semibold text-gray-500">
                                    Amount:  &#8358;35,000
                                </p>
                            </div>
                        </div>
                        @endforeach
                    
                    </div>
      
                    <div class="grid grid-cols-2 gap-6 mt-5">
                        <div class="border-2 border-solid border-gray-200 rounded-lg w-full">
                            <div class="p-1 py-2 border-b-2 border-gray-200 border-solid">
                                <h3 class="capitalize text-xl">payment information</h3>
                                
                            </div>

                            <div class="p-3">
                                <p class="font-semibold">Payment Method:</p>
                                <p class="text-gray-500">Paystack</p>
                                <h2 class="mt-5">Payment Details:</h2>
                                <p class="text-gray-500">items total: &#8358;60,000</p>
                                <p class="text-gray-500">shipping fee: &#8358;1,000</p>
                                <p class="text-gray-500">Total: &#8358;61,000</p>
                            </div>

                        </div>

                        <div class="border-2 border-solid border-gray-200 rounded-lg w-full">
                            <div class="p-1 py-2 border-b-2 border-gray-200 border-solid">
                                <h3 class="capitalize text-xl">delivery information</h3>
                                
                            </div>
                            <div class="p-3">
                                <p class="font-semibold">Delivery Method:</p>
                                <p class="text-gray-500">Home delivery</p>
                                <p class="mt-8">Pick-up station address:</p>
                            </div>
                        </div>
                    </div>
                  
                </div> 
                
                <!---->
                <div class="p-3 border-b-2 border-gray-200 border-solid w-full flex" style="justify-content: flex-end">
                    <div class="p-1 py-3 px-4">
                        <button id="paymentButton"
                            class="bg-slay text-gray-50 py-3 px-5 cursor-pointer fixed bottom-10 right-14 w-72 text-2xl rounded" 
                            onclick="payWithPaystack();"
                        > Complete Payment
                        </button>
                    </div>
                </div>

                
            </div>
        <div>
    </main>
<!---
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm">Small modal</button>
    
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">Info</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body-message">
                </div>
            </div>
        </div>
    </div>
-->
</div>

@push('scripts')
<script src="{{ asset('assets/js/tooltip-init.js')}}"></script>
<script src="https://js.paystack.co/v2/inline.js"></script>
<script>
var paymentForm = document.getElementById('paymentButton');
paymentForm.addEventListener('click', payWithPaystack, false);
var user_id = {!! auth()->user()->id() !!};
function payWithPaystack() {
    var handler = PaystackPop.setup({
        key: {!! env('PAYSTACK_PUBLIC_KEY') !!}, currency: 'NGN', ref: {!! $reference !!},
        email: {!! auth()->user()->email !!}, amount: {!! $total !!} * 100, //amount in kobo
        metadata: {!! $cartContent !!}
        callback: async function(response) {
            document.getElementById(
                "modal-body-message"
            ).innerHTML = "Transaction Completed. Redirecting...";
            fetch(`https://stayslayfashion.com/api/transaction/verify/${response.reference}/${user_id}`, {
                method: "GET", headers: { 'Accept': 'application/json' },
            }).then(res => res.json()).then(data => {
                window.location.href="/order-history";
            }).catch(err => console.log(err));
        },
        onClose: function() {
            document.getElementById(
                "modal-body-message"
            ).innerHTML = "Transaction was not completed, window closed.";
        },
    });
    handler.openIframe();
}
</script>
@endpush
