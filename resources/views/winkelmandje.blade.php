<x-layouts.app>

    @foreach ($orders as $order)

        @foreach ($order->products as $product)

            @php($pivotData = $product->pivot) <br>


            @php($productamountprice = $pivotData->amount * $product->price)



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
                            amount {{ $pivotData->amount }}
                        </div>
                        <div class="row">
                            price = ${{ $productamountprice }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <form action="" method="post">
            <label>name</label>
            <input type="text" id="=name" name="name" size="2" value="">
            <label>Payment</label>
            {{--            <input type="text" id="price" name="price" size="2" value="{{ $total }}">--}}
            <button>Finish Order!</button>
            @csrf
        </form>
    @endforeach

</x-layouts.app>