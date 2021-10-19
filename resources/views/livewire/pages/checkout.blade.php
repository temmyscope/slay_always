@extends('layouts.app')
@section('title', 'Checkout')

    @section('content')
    <div>
        <!-- payWithPaystack() on payment button -->

    </div>

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

    @push('scripts')
    <script src="{{ asset('assets/js/tooltip-init.js')}}"></script>
    <script src="https://js.paystack.co/v2/inline.js"></script>
    <script>
    var paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener('submit', payWithPaystack, false);
    var user_id = {!! auth()->user()->id() !!};
    function payWithPaystack() {
        var handler = PaystackPop.setup({
            key: 'YOUR_PUBLIC_KEY', currency: 'NGN', ref: {!! $reference !!},
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
@endsection
