<div class="col-2">
    <div class="card">
        <div class="card-header"><a
                {{--                href="--}}
                {{--        {{ route('products.show',$product) }}--}}
                {{--        "--}}
            >{{ $product->name }}</a></div>
        <div class="card-body">
            <div class="row">
                @livewire('update-cart',
                [
                'count' => $count,
                'product' => $product,
                ])
            </div>
        </div>
    </div>
</div>




