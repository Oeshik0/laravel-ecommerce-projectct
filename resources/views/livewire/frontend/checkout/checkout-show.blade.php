<div>


    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener('livewire:init', () => {
                    Livewire.on('order-success', () => {
                        Swal.fire({
                            title: 'Thank you!',
                            text: 'Your order has been placed successfully.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2500
                        });

                        setTimeout(() => {
                            window.location.href = '/thank-you';
                        }, 2500);
                    });

                    Livewire.on('order-fail', () => {
                        Swal.fire({
                            title: 'Oops!',
                            text: 'Something went wrong while placing your order.',
                            icon: 'error',
                            confirmButtonText: 'Try Again'
                        });
                    });
                });
            </script>

            <script>
                window.addEventListener('validation-error', event => {
                    alert(event.detail.message);
                });
            </script>






            <h4>Checkout</h4>

            <hr>
            @if ($this->totalProductAmount != '0')
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Item Total Amount :
                                <span class="float-end">TK {{ $this->totalProductAmount }}</span>
                            </h4>
                            <hr>
                            <small>* Items will be delivered in 3 - 5 days.</small>
                            <br />
                            <small>* Tax and other charges are included ?</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Basic Information

                            </h4>
                            <hr>


                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Full Name</label>
                                    <input type="text" wire:model.defer="fullname" id="fullname"
                                        class="form-control" placeholder="Enter Full Name" />
                                    @error('fullname')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Phone Number</label>
                                    <input type="number" wire:model.defer="phone" id="phone" class="form-control"
                                        placeholder="Enter Phone Number" />
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email Address</label>
                                    <input type="email" wire:model.defer="email" id="email" class="form-control"
                                        placeholder="Enter Email Address" />
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Pin-code (Zip-code)</label>

                                    <input type="number" wire:model.defer="pincode" id="pincode" class="form-control"
                                        placeholder="Enter Pin-code" />
                                    @error('pincode')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3" wire:ignore>
                                    <label>Full Address</label>
                                    <textarea wire:model.defer="address" id="address" class="form-control" rows="2"></textarea>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Select Payment Mode: </label>
                                    <div class="d-md-flex align-items-start">
                                        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab"
                                            role="tablist" aria-orientation="vertical">
                                            <button wire:loading.attr="disabled" class="nav-link fw-bold"
                                                id="cashOnDeliveryTab-tab" data-bs-toggle="pill"
                                                data-bs-target="#cashOnDeliveryTab" type="button" role="tab"
                                                aria-controls="cashOnDeliveryTab" aria-selected="true">
                                                Cash on Delivery
                                            </button>
                                            <button wire:loading.attr="disabled" class="nav-link fw-bold"
                                                id="onlinePayment-tab" data-bs-toggle="pill"
                                                data-bs-target="#onlinePayment" type="button" role="tab"
                                                aria-controls="onlinePayment" aria-selected="false">
                                                Online Payment
                                            </button>
                                        </div>
                                        <div class="tab-content col-md-9" id="v-pills-tabContent">
                                            <div class="tab-pane fade" id="cashOnDeliveryTab" role="tabpanel"
                                                aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                <h6>Cash on Delivery Mode</h6>
                                                <hr />
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="codOrder" class="btn btn-primary">
                                                    <span wire:loading.remove wire:target="codOrder">

                                                        Place Order (Cash on Delivery)
                                                    </span>
                                                    <span wire:loading wire:target="codOrder">

                                                        Placeing Order
                                                    </span>
                                                </button>
                                            </div>

                                            <div class="tab-pane fade" id="onlinePayment" role="tabpanel"
                                                aria-labelledby="onlinePayment-tab" tabindex="0">
                                                <h6>Online Payment Mode</h6>
                                                <hr />
                                                {{-- <button type="button" wire:loading.attr="disabled" class="btn btn-warning">
                                                    Pay Now (Online Payment)
                                                </button> --}}
                                                <div>
                                                    <div id="paypal-button-container" wire:ignore
                                                        data-livewire-id="{{ $this->getId() }}"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                @else
                    <div class="card card-body shadow text-center p-md-5">
                        <h4>No item to checkout</h4>
                        <a href="{{ url('collections') }}" class="btn btn-warning">Shop Now</a>
                    </div>
            @endif
        </div>
    </div>
</div>
@push('scripts')
    <script
        src="https://www.paypal.com/sdk/js?client-id=AS8m96BFwN4Ng0uHWG5Ip2SbUcEV7BYK6xqLcV9Ql87oI4eIJ-FYWKPz7fT2uTAspM_GPNhohAgbTopJ&currency=USD">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Page ready, initializing PayPal...');

            let component = null; // Declare once globally
            const paypalButtonContainer = document.getElementById("paypal-button-container");

            if (paypalButtonContainer) {
                const livewireId = paypalButtonContainer.dataset.livewireId;
                component = Livewire.find(livewireId);
            }

            if (typeof paypal !== 'undefined') {
                console.log('PayPal SDK loaded!');

                paypal.Buttons({
                    onClick: function() {
                        const fullname = document.getElementById("fullname").value;
                        const phone = document.getElementById("phone").value;
                        const email = document.getElementById("email").value;
                        const pincode = document.getElementById("pincode").value;
                        const address = document.getElementById("address").value;

                        if (!fullname || !phone || !email || !pincode || !address) {
                            if (typeof Livewire !== 'undefined' && Livewire.emit) {
                                Livewire.emit('validationForAll');
                            } else {
                                console.error('Livewire is not available');
                            }
                            return false;
                        } else {
                            if (component) {
                                component.set('fullname', fullname);
                                component.set('email', email);
                                component.set('phone', phone);
                                component.set('pincode', pincode);
                                component.set('address', address);
                            } else {
                                console.error('Livewire component not found on click.');
                            }
                        }
                    },
                    createOrder: function(data, actions) {
                        // Get the original amount
                        var originalAmount = parseFloat("{{ $this->totalProductAmount }}");

                        // Divide by 121
                        var dividedAmount = originalAmount / 121;

                        // Round to 2 decimal places for currency
                        dividedAmount = Math.round(dividedAmount * 100) / 100;

                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: dividedAmount.toString(),
                                    currency_code: "USD" // Make sure to include your currency code
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
                            alert('Transaction completed by ' + details.payer.name.given_name +
                                '!');

                            if (component) {
                                component.call('paidOnlineOrder', details.id);
                            } else {
                                console.error('Livewire component not found after approval.');
                            }
                        }).catch(function(error) {
                            console.error('Transaction capture failed:', error);
                            alert(
                                'There was an issue with the payment. Please try again later.');
                        });
                    }
                }).render('#paypal-button-container');

            } else {
                console.error('PayPal SDK NOT loaded!');
            }
        });
    </script>
@endpush
