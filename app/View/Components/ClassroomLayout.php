<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ClassroomLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title,public ?string $class =null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.classroom-layout');
    }
}
