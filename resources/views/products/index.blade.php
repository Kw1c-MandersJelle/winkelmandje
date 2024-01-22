<x-layouts.app>
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <x-product :product="$product"></x-product>

            @endforeach
        </div>
    </div>
</x-layouts.app>
