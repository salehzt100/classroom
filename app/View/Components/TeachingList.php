<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TeachingList extends Component
{

    public function __construct(Public $user , public $classrooms=null )
    {

        $this->classrooms=$this->user->classrooms()->wherePivot('role','=','teacher')->get();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.teaching-list');
    }
}
