<?php

namespace App\View\Components;

use App\Types\FlashTypes;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Flash extends Component
{
    public function __construct(
        public string $message = '',
        public string $type = 'success',
        public bool $dismissible = true,
        public int $timeout = 5000 // ms less than -1 = no timeout
    ) 
    {
        if (!in_array($this->type, FlashTypes::values())) {
            $this->type = FlashTypes::Warning->value;
        }
    }


    public function render()
    {
        return view('components.flash');
    }
}
