<?php

namespace App\Http\Livewire;

use App\Models\Beans;
use Livewire\Component;

class CoffeeBeanManage extends Component
{
    public $beans;
    public $delete_id;

    protected $listeners = [
        'delete' => 'delete'
    ];

    public function mount()
    {
        $this->beans = Beans::all();
    }

    public function deleteConfirm($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('showDeleteConfirmPopup');
    }

    public function delete()
    {
        $bean = Beans::where('id', $this->delete_id)->first();
        $bean->delete();
        $this->mount();
        $this->dispatchBrowserEvent('deleted');
    }

    public function render()
    {
        return view('livewire.coffee-bean-manage');
    }
}
