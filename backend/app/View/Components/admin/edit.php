<?php

namespace App\View\Components\admin;

use App\Models\Admin\Product;
use App\Models\Taxonomy;
use App\Models\Term;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class edit extends Component
{
    public $type;
    public $action;
    public $content;
    /**
     * Create a new component instance.
     */
    public function __construct( $type, $content = [])
    {
        $this->type = $type;
        $this->action = 'store';

        if(isset($content['id'])){
            $this->action = 'edit';
        }

        $this->content = match ($type) {
            'terms' => isset($content['id']) ? Term::find( $content['id'] ) : new Term(),
            'products' => isset($content['id']) ? Product::find( $content['id'] ) : new Product(),
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
        // Term
        $taxonomies= Taxonomy::get();
        return view('components.admin.edit', compact('taxonomies'));
    }
}
