<?php

namespace App\Providers;

use App\Events\OpenAddReminderEvent;
use Native\Laravel\Facades\Window;
use Native\Laravel\Contracts\ProvidesPhpIni;
use Native\Laravel\Menu\Menu;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        Window::open('reminder_app')
        ->route('reminder-app')
        ->title('Reminder App')
        ->showDevTools()
        ->height(800)
        ->width(800);

        // Window::open('second')
        // ->route('home')
        // ->title('second window')
        // ->showDevTools(false)
        // ->height(800)
        // ->width(800);

        Menu::new()
            ->appMenu()
            ->submenu('About', Menu::new()
                ->event(OpenAddReminderEvent::class, 'Add Reminder', 'cmd+r')
                ->link('https://nativephp.com', 'NativePHP', 'cmd+b')
                ->separator()
                ->checkbox('Checkbox')
            )
            ->submenu('View', Menu::new()
                ->toggleFullscreen()
                ->separator()
                ->toggleDevTools()
            )
            ->register();
        // Menu::new()
        //     ->appMenu()
        //     ->submenu('About', Menu::new()
        //         ->link('https://nativephp.com', 'NativePHP')
        //     )
        //     ->submenu('View', Menu::new()
        //         ->toggleFullscreen()
        //         ->separator()
        //         ->toggleDevTools()
        //     )
        //     ->register();
 
        // Window::open()
        //     ->width(800)
        //     ->height(800);
    }

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [
        ];
    }
}
