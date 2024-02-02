<x-layouts.app>
    @if($ordered)
        @foreach($ordered as $ordered)
            @foreach ($ordered->products as $product)
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
                        <div class="card-body">
                            <div class="row">
                                amount {{ $product->pivot->amount }}
                            </div>
                            <div class="row">
                                price = ${{ $product->pivot->amount * $product->price }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    @else
        @if(Auth::User())
            <div>
                u have no current ordered orders
            </div>
        @else
            <div>
                please log in to view ur current ordered orders!
            </div>
        @endif
    @endif
</x-layouts.app>
