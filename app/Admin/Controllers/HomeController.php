<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Content;


class HomeController extends Controller
{
    public function index(Content $content): content
    {
        
        if (session('success')) {
            admin_toastr(session('success'), 'success');
        }

        return $content
            ->title('Home ')
            ->row(Dashboard::title());
            
    }
}
