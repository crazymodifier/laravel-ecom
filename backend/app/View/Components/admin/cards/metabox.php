<?php

namespace App\View\Components\admin\cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class metabox extends Component
{
    public $title;
    public $content;
    /**
     * Create a new component instance.
     */
    public function __construct($data=[])
    {
        // dd($data);
        $this->title = $data['title'];
        $this->content = $data['content'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.cards.metabox');
    }
}
