<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = "咨询管理";

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('name',"名称");
        $grid->column('phone','手机号码');
        return $grid;
    }

     /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field("name","姓名");
        $show->field("phone",'电话');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', "名字")->rules("required");
        $form->mobile('phone','电话号码/登陆名')->rules(function($form){
            if(!$id=$form->model()->id){
                return 'unique:users,min:11';
            }
        });
        $form->password('password', "输入密码")->rules(function($form){
            if(!$id=$form->model()->id){
                return 'required,min:8,max:20';
            }
            return 'min:8';
        });
        $form->saving(function(Form $form){
            $form->password=Hash::make($form->password);
        });
        $form->saved(function(Form $form){
            return redirect('/admin/users');
        });
        return $form;
    }
}
