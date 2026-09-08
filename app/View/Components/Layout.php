<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{
    public $title;

    public function __construct($title = null)
    {
        $this->title = $title ?? 'Nihongo Roulette';
    }

    public function render()
    {
        return view('components.layout');
    }
}