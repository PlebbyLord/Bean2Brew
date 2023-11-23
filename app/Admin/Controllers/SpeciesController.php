<?php

namespace App\Admin\Controllers;

use App\Models\Species;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SpeciesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Species';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): grid
    {
        $grid = new Grid(new Species());



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
        $show = new Show(Species::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): form
    {
        $form = new Form(new Species());



        return $form;
    }
}
