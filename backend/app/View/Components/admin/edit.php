<?php

namespace App\View\Components\admin;

use App\Models\Admin\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class edit extends Component
{
    public $type;
    public $sideMeta;
    public $content;
    /**
     * Create a new component instance.
     */
    public function __construct($type,$sideMeta = [])
    {
        $this->type = $type;
        $this->sideMeta = $sideMeta;
        // $this->action = route( "admin.{$type}.update" )
        $this->content = match ($type) {
            // 'terms' => Term::where('tax_id', $id)->latest()->paginate(10),
            'products' => Product::find(1),
            // 'orders' => Order::latest()->paginate(10),
            // 'invoices' => Invoice::latest()->paginate(10),
            default => collect(),
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.edit');
    }
}
