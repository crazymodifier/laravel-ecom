<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected function prepareViewData(array $args)
    {
        // Set SEO Tools

        

        $defaults = [
            'pageName' => '',
            'adminNotices' => $this->getAdminNotices()
        ];

        $args = array_merge( $defaults, $args );



        if(isset($args['pageName'])){
            SEOTools::setTitle($args['pageName']);
        }
        if(isset($args['pageDescription'])){
            SEOTools::setDescription($args['pageDescription']);
        }
        // Prepare page data
        return $args;
    }

    protected function getAdminNotices()
    {
        $adminNotices = [];

        // Add permanent notices (e.g., fetched from a database or config)
        // $adminNotices[] = (object) ['class' => 'info', 'message' => 'This is a permanent notice.'];

        // Check for flash messages
        if (session('success')) {
            $adminNotices[] = (object) ['class' => 'success', 'message' => session('success')];
        }

        if (session('error')) {
            $adminNotices[] = (object) ['class' => 'danger', 'message' => session('error')];
        }

        return $adminNotices;
    }
}
