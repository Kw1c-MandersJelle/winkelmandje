<div>
    Price: {{ $price }}<br>

    <button wire:click="increment" class="bg-success">+</button>
    Count: {{ $count }}
    <button wire:click="decrement" class="bg-danger">-</button>
    <button wire:click="updateCart" class="bg-primary card-footer">update cart</button>
    

</div>
