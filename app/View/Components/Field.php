<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Field extends Component
{
    public function __construct(
        public string $id = "",
        public ?string $label = null,
        public string $type = "text",
        public string $classes = "",
        public string $placeholder = "",
        public bool $required = false,
        public string $value = "",
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view("components.field");
    }
}
