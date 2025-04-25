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
                                    <input type="text" wire:model="fullname" class="form-control"
                                        placeholder="Enter Full Name" />
                                    @error('fullname')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Phone Number</label>
                                    <input type="number" wire:model="phone" class="form-control"
                                        placeholder="Enter Phone Number" />
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email Address</label>
                                    <input type="email" wire:model="email" class="form-control"
                                        placeholder="Enter Email Address" />
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Pin-code (Zip-code)</label>

                                    <input type="number" wire:model="pincode" class="form-control"
                                        placeholder="Enter Pin-code" />
                                    @error('pincode')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Full Address</label>
                                    <textarea wire:model="address" class="form-control" rows="2"></textarea>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="payment-mode" class="form-label"> </label>
                                    <div class="d-md-flex align-items-start">
                                        <div class="col-md-12">
                                            <div class="shadow bg-white p-4 rounded">
                                                <div class="d-flex justify-content-between align-items-center mb-4">
                                                    <h5 class="mb-0 text-muted">Payment Mode</h5>
                                                    <div class="d-flex">
                                                        <button type="button"
                                                            class="btn btn-success fw-bold px-4 py-2">
                                                            Cash on Delivery
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="text-center">
                                                    <h6 class="text-muted">Cash on Delivery Mode</h6>
                                                    <hr />
                                                    <p>Confirm your order and choose to pay upon delivery. Your order
                                                        will be processed immediately.</p>
                                                    <button type="button" wire:click="codOrder"
                                                        class="btn btn-primary btn-lg">Place Order (Cash on
                                                        Delivery)</button>
                                                </div>
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
