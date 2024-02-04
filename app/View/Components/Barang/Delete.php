<?php

namespace App\View\Components\Barang;

use App\Models\Barang;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Delete extends Component
{
    public string $action;
    /**
     * Create a new component instance.
     */
    public function __construct(public Barang $barang)
    {
        $this->action = route('admin.barang.delete', ['id' => $barang->id]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.barang.delete');
    }
}
