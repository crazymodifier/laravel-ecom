<?php

namespace App\View\Components\admin;

use App\Models\Taxonomy;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidebar extends Component
{
    public $menu;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $taxs = Taxonomy::all()
                ->map(function (Taxonomy $taxonomy) {
                    $data[$taxonomy->slug] = [
                        'title' => $taxonomy->name
                    ];
                    return $data;
                })
                ->all();
        $this->menu = [
            'taxonomies' => [
                'order' => 4,
                'title' => 'Taxonomies',
                'icon' => 'bi-ui-checks-grid',
                'children' => $taxs
            ],
            'products' => [
                'order' => 1,
                'title' => 'Products',
                'icon' => 'bi-tag',
                // 'children' => $taxs
            ],
            'orders' => [
                'order' => 2,
                'title' => 'Orders',
                'icon' => 'bi-cart',
                // 'children' => $taxs
            ],
            'invoices' => [
                'order' => 3,
                'title' => 'Invoices',
                'icon' => 'bi-file',
                // 'children' => $taxs
            ],
            'users' => [
                'order' => 3,
                'title' => 'Users',
                'icon' => 'bi-file',
                // 'children' => $taxs
            ],
            
        ];

        // dd($this->menu);

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        
        return view('components.admin.sidebar', ['menus' => $this->menu]);
    }
}
