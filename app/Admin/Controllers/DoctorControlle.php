<?php

namespace App\Admin\Controllers;

use App\Models\Doctor;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Selectable\Departmernts;
use App\Models\Departmernt;
class DoctorControlle extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '医生列表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Doctor());

        $grid->column('id', 'ID');
        $grid->column('name', "姓名");
        $grid->column('departmernt.name', "所属科室");
        return $grid;
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Doctor());

        $form->text('name',"姓名")->required();
        $form->belongsTo('departmernt_id',Departmernts::class ,"所在科室");

        return $form;
    }
}
