<?php

namespace App\Http\Livewire;

use App\Models\Beans;
use App\Models\Coffee;
use Livewire\Component;

class CoffeeManage extends Component
{
    public $coffees;
    public $beans;
    public $delete_id;

    protected $listeners = [
        'delete' => 'delete'
    ];

    public function mount()
    {
        $this->coffees = Coffee::all();
        $this->beans = Beans::all();
    }

    public function deleteConfirm($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('showDeleteConfirm');
    }

    public function delete()
    {
        $coffee = Coffee::where('id', $this->delete_id)->first();
        $coffee->delete();
        $this->mount();
        $this->dispatchBrowserEvent('deleted');
    }

    public function render()
    {
        return view('livewire.coffee-manage');
    }
}
