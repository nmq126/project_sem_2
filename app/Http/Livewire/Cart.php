<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public function increaseQuantity($Id)
    {
        $product = Cart::get($Id);
        $quantity = $product->quantity + 1;
        Cart::update($Id, $quantity);
    }

    public function decreaseQuantity($Id)
    {
        $product = Cart::get($Id);
        $quantity = $product->quantity - 1;
        Cart::update($Id, $quantity);
    }

    public function render()
    {
        return view('client.cart');
    }
}
