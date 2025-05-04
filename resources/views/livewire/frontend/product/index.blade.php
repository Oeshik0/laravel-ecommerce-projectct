<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Brands</h4>
                </div>
                <div class="card-body">
                    @foreach ($catagory->brands as $brandItem)
                        <label class="d-block">
                            <input type="checkbox" wire:model="brandInputs" value="{{ $brandItem->name }}"
                                wire:change="logBrandInputs" />
                            {{ $brandItem->name }}
                        </label>
                    @endforeach


                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h4>Prices</h4>
                </div>
                <div class="card-body">
                        <label class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low"
                                wire:change="logpriceInput" />
                            High To Low
                        </label>
                        <label class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high"
                                wire:change="logpriceInput" />
                            Low To High
                        </label>

                </div>
            </div>

        </div>
        <div class="col-md-9">

            <div class="row">
                @forelse($products as $productItem)
                    <div class="col-md-4 mb-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($productItem->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out of Stock</label>
                                @endif

                                @if ($productItem->productImages->count() > 0)
                                    <a
                                        href="{{ url('/collections/' . $productItem->catagory->slug . '/' . $productItem->slug) }}">
                                        <img src="{{ asset($productItem->productImages[0]->image) }}"
                                            alt="{{ $productItem->name }}"
                                            style="width: 300px; height: 200px; object-fit: cover; border-radius: 8px;">
                                            
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->brand }}</p>
                                <h5 class="product-name">
                                    <a
                                        href="{{ url('/collections/' . $productItem->catagory->slug . '/' . $productItem->slug) }}">
                                        {{ $productItem->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">Tk {{ $productItem->selling_price }}</span>
                                    <span class="original-price">Tk {{ $productItem->original_price }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Product Available For {{ $catagory->name }}</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    {{-- <pre>{{ var_export($brandInputs, true) }}</pre> --}}

</div>
