<x-layouts.app>
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                @php($count = optional($product->pivot)->amount ?? 0)
                <x-product :product="$product" :count="$count"></x-product>
            @endforeach
        </div>
    </div>
</x-layouts.app>
