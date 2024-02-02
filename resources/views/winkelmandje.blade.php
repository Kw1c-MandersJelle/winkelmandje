<x-layouts.app>
    @if($order)
        @foreach ($order->products as $product)
            <br>
            <div class="container">
                <div class="card" style="width: 18rem">
                    <img
                        src="storage/{{$product->image}}"
                        class="card-img-top " alt="" style="width: 100%">
                    <div class="card-header">
                        <div class="row">
                            {{ $product->name }}
                        </div>
                    </div>
                    @livewire('DeleteCartProduct',
                    [
                    'orderproduct_id' => $product->pivot->id
                    ])
                    <div class="card-body">
                        <div class="row">
                            amount {{ $product->pivot->amount }}
                        </div>
                        <div class="row">
                            price = ${{ $product->pivot->amount * $product->price }}.
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <form method="post" action="{{ route('completeorder',$order) }}">
            @csrf
            <label>Payment</label>
            <input type="text" id="price" name="price" size="2" value="{{ $price_total }}">
            <button type="submit">Finish Order!</button>
        </form>
    @else
        @if(Auth::user())
            <div> there are no products in your shopping cart</div>
        @else
            <div>
                please log in to see ur current shopping cart
            </div>
        @endif
    @endif
</x-layouts.app>
