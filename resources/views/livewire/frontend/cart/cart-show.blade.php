<div>

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <h4>My Cart</h4>
            <hr>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif


            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @forelse ($cart as $cartItem)
                            @if ($cartItem->product)
                                <div class="cart-item">

                                    <div class="row">
                                        <div class="col-md-6 my-auto">
                                            <a
                                                href="{{ url('collections/' . $cartItem->product->catagory->slug . '/' . $cartItem->product->slug) }}">
                                                <label class="product-name">
                                                    @php
                                                        $product = $cartItem->product;
                                                        $firstImage =
                                                            $product &&
                                                            $product->productImages &&
                                                            $product->productImages->count() > 0
                                                                ? $product->productImages[0]->image
                                                                : 'images/default.png';
                                                    @endphp

                                                    <img src="{{ asset($firstImage) }}"
                                                        style="width: 50px; height: 50px" alt="">

                                                    {{ $cartItem->product->name }}
                                                    @if ($cartItem->productColor)
                                                        @if ($cartItem->productColor->color)
                                                            <span>-Color:
                                                                {{ $cartItem->productColor->color->name }}</span>
                                                        @endif
                                                    @endif
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-1 my-auto">
                                            <label class="price">TK {{ $cartItem->product->selling_price }} </label>
                                        </div>
                                        <div class="col-md-2 col-7 my-auto">
                                            <div class="quantity">
                                                <div class="input-group">
                                                    <button type= "button" wire:loading.attr="disabled"
                                                        wire:click="decrementQuantity({{ $cartItem->id }})"
                                                        class="btn btn1"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{ $cartItem->quantity }}"
                                                        class="input-quantity" />
                                                    <button type= "button" wire:loading.attr="disabled"
                                                        wire:click="incrementQuantity({{ $cartItem->id }})"
                                                        class="btn btn1"><i class="fa fa-plus"></i></button>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-1 my-auto">
                                            <label class="price">TK
                                                {{ $cartItem->product->selling_price * $cartItem->quantity }} </label>
                                            @php $totalPrice += $cartItem->product->selling_price * $cartItem->quantity  @endphp
                                        </div>
                                        <div class="col-md-2 col-5 my-auto">
                                            <div class="remove">
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="removeCartItem({{ $cartItem->id }})"
                                                    class="btn btn-danger btn-sm">
                                                    <span wire:loading.remove
                                                        wire:target="removeCartItem({{ $cartItem->id }})">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </span>
                                                    <span wire:loading
                                                        wire:target="removeCartItem({{ $cartItem->id }})">
                                                        <i class="fa fa-trash"></i> Removing
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        @empty
                            <div>No Cart Item Available</div>
                        @endforelse

                    </div>
                </div>

            </div>
            <div class="row">
                <!-- Promotional Banner -->
                <div class="col-md-8 mt-3">
                    <div
                        class="bg-primary text-white p-4 rounded shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">Get the <strong>best deals & offers</strong></h5>
                            <p class="mb-0">Check out our latest collections now!</p>
                        </div>
                        <a href="{{ url('/collections') }}" class="btn btn-light text-primary fw-semibold">
                            Shop Now
                        </a>
                    </div>
                </div>


                <!-- Total Price and Checkout -->
                <div class="col-md-4 mt-3">
                    <div class="bg-white p-4 rounded shadow-sm">
                        <h4 class="mb-3 d-flex justify-content-between align-items-center">
                            <span>Total:</span>
                            <span class="text-success fw-bold">TK {{ $totalPrice }}</span>
                        </h4>
                        <hr>
                        <a href="{{ url('/checkout') }}" class="btn btn-warning w-100 fw-semibold">
                            Proceed to Checkout
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
