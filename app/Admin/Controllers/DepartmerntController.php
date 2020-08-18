<?php

namespace App\Admin\Controllers;

use App\Models\Departmernt;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DepartmerntController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '科室信息';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Departmernt());

        $grid->column('id', '编号');
        $grid->column('name', "科室名称");
        $grid->actions(function($actions){
            $actions->disableDelete();
            $actions->disableView();
        });
        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Departmernt());

        $form->text('name', "科室名称")->required();

        return $form;
    }
}
