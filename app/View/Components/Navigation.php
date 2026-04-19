<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navigation extends Component
{
    /**
     * Create a new component instance.
     */

    public function __construct(public array $links = []) {}

    /*
        Returns an array contains a data for navigation menu.
    */
    public function getMenu(): array
    {
        return collect($this->links)
            ->map(function ($label, $routeName) {
                return [
                    "label" => $label,
                    "url" => route($routeName),
                    "is_active" => request()->routeIs($routeName),
                ];
            })
            ->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view("components.navigation");
    }
}
