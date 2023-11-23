<?php

namespace App\Admin\Controllers;

use App\Models\Grow;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GrowController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Grow';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): grid
    {
        $grid = new Grid(new Grow());



        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id): show
    {
        $show = new Show(Grow::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): form
    {
        $form = new Form(new Grow());



        return $form;
    }
}
