<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        
        if (session('success')) {
            admin_toastr(session('success'), 'success');
        }

        return $content
            ->title('Home ')
            ->row(Dashboard::title());
            
    }
}
