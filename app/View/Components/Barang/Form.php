<?php

namespace App\View\Components\Barang;

use App\Models\Barang;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Barang $barang,
        public string $action,
        public ?string $method=null,
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.barang.form');
    }
}
