<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class enrolledList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(Public $user , public $classrooms=null )
    {

        $this->classrooms=$this->user->classrooms()->wherePivot('role','=','student')->get();

    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.enrolled-list');
    }
}
