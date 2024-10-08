<?php

namespace App\Services\Admin;

class ListTableService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getColumns($type)
    {
        switch ($type) {
            case 'orders':
                return [
                    ['label' => 'ID', 'key' => 'id', 'width' => '10%'],
                    ['label' => 'Thumbnail', 'key' => 'thumbnail', 'width' => '10%'],
                    ['label' => 'Name', 'key' => 'name', 'width' => '25%'],
                    ['label' => 'Slug', 'key' => 'slug', 'width' => '25%'],
                    ['label' => 'Parent', 'key' => 'parent', 'width' => '10%'],
                    ['label' => 'Action', 'key' => 'action', 'width' => '10%'],
                ];
            case 'terms':
                return [
                    ['label' => 'ID', 'key' => 'id', 'width' => '10%'],
                    ['label' => 'Thumbnail', 'key' => 'thumbnail', 'width' => '10%'],
                    ['label' => 'Name', 'key' => 'name', 'width' => '25%'],
                    ['label' => 'Slug', 'key' => 'slug', 'width' => '25%'],
                    ['label' => 'Parent', 'key' => 'parent', 'width' => '10%'],
                    ['label' => 'Action', 'key' => 'action', 'width' => '10%'],
                ];
            case 'invoices':
                return [
                    ['label' => 'Invoice ID', 'key' => 'invoice_id', 'width' => '10%'],
                    ['label' => 'Client Name', 'key' => 'client_name', 'width' => '25%'],
                    ['label' => 'Total Amount', 'key' => 'total_amount', 'width' => '25%'],
                    ['label' => 'Status', 'key' => 'status', 'width' => '15%'],
                    ['label' => 'Action', 'key' => 'action', 'width' => '10%'],
                ];
            case 'products':
                return [
                    ['label' => 'ID', 'key' => 'id', 'width' => '10%'],
                    ['label' => 'Thumbnail', 'key' => 'thumbnail', 'width' => '10%'],
                    ['label' => 'Title', 'key' => 'title', 'width' => '25%'],
                    ['label' => 'Categories', 'key' => 'categories', 'width' => '25%'],
                    ['label' => 'Status', 'key' => 'status', 'width' => '15%'],
                    ['label' => 'Action', 'key' => 'action', 'width' => '10%'],
                ];
            default:
                return [];
        }
    }
}
