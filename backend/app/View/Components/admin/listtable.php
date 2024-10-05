<?php

namespace App\View\Components\admin;

use App\Models\Admin\Invoice;
use App\Models\Admin\Order;
use App\Models\Taxonomy;
use App\Models\Term;
use App\Services\Admin\ListTableService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class listtable extends Component
{
    public $data;
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



        $this->data = match ($type) {
            'terms' => Term::where('tax_id', $id)->latest()->paginate(10),
            'products' => Order::latest()->paginate(10),
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

        $data = [
            'type' => $this->type,
            'data' => $this->data,
            'columns' => $this->columns
        ];
        return view('components.admin.listtable', $data);
    }
}
