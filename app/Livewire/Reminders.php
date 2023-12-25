<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Native\Laravel\Events\Settings\SettingChanged;

class Reminders extends Component
{
    public $count = 0;

    protected $listeners = [
        'SettingChanged' => 'increment'
    ];
    // #[On('native'.SettingChanged::class)]
    public function increment()
    {
        dd('in');
        $this->count++;
    }

    public function render()
    {
        return view('livewire.reminders');
    }

}
