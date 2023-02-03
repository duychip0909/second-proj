<?php

namespace App\Http\Livewire;

use App\Enums\DrinkOptions;
use Livewire\Component;

class Cart extends Component
{
    public $inputValue;
    public $carts;
    public $options;
    public $cupTotal;
    public $subTotal;

    protected $listeners = ['updateItem'];

    public function mount()
    {
        $this->carts = session()->get('cart', []);
        $this->options = DrinkOptions::getInstances();
        $this->cupTotal = array_sum(array_column($this->carts, 'quantity'));
        $this->subTotal = array_reduce($this->carts, function($grand, $cart) {
            $grand += $cart['quantity'] * $cart['price'];
            return $grand;
        });
    }

    public function removeItem($id)
    {
        if ($id) {
            $this->carts = session()->get('cart', []);
            $name = $this->carts[$id]['name'];
            unset($this->carts[$id]);
            session()->put('cart', $this->carts);
        }
        $this->dispatchBrowserEvent('removeSuccess', ['name' => $name]);
        $this->mount();
    }

    public function updateItem($id, $quantity)
    {
        if ($id && $quantity) {
            $this->carts = session()->get('cart', []);
            $this->carts[$id]['quantity'] = $quantity;
            session()->put('cart', $this->carts);
        }
        $this->mount();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
