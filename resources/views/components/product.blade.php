<div class="col-2">
    <div class="card">
        <div class="card-header"><a href="{{ route('products.show',$product) }}">{{ $product->name }}</a></div>
        <div class="card-body">
            <div class="row">
                {{ $product->price }}$
                <form method="post" action="{{ route('order.create',$product) }}">
                    @CSRF
                    <label>amount</label>
                    <input type="text" id="amount" name="amount" size="2" value="1">
                    <button type="submit" class="button bg-success">add to cart!</button>
                </form>
            </div>
        </div>
    </div>
</div>

