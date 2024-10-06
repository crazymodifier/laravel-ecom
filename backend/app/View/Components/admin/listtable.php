<?php

namespace App\View\Components\admin;

use App\Models\Admin\Invoice;
use App\Models\Admin\Order;
use App\Models\Admin\Product;
use App\Models\Taxonomy;
use App\Models\Term;
use App\Services\Admin\ListTableService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class listtable extends Component
{
    public $content;
    public $type;
    public $columns;
    /**
     * Create a new component instance.
     */
    public function __construct(ListTableService $listTableService, string $type = '', string $taxonomy = '', string $id = '')
    {
        //
        $this->type = $type;
        $this->columns = $listTableService->getColumns($type);



        $this->content = match ($type) {
            'terms' => Term::where('tax_id', $id)->latest()->paginate(10),
            'products' => Product::latest()->paginate(10),
            'orders' => Order::latest()->paginate(10),
            'invoices' => Invoice::latest()->paginate(10),
            default => collect(),
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.listtable');

    }
}
