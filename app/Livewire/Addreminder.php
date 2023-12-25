<?php

namespace App\Livewire;

use Livewire\Component;
use Native\Laravel\Facades\Settings;

class Addreminder extends Component
{
    public function render()
    {
        return view('livewire.addreminder');
    }

    public function add()
    {
        Settings::set('count', rand(1, 1000));
    }
}
