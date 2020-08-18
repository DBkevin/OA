<?php

namespace App\Admin\Controllers;

use App\Models\Post;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Selectable\Users;

class PostController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '案例中心';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Post());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('title', __('Title'));
        $grid->column('ZXimages', __('ZXimages'));
        $grid->column('WCimages', __('WCimages'));
        $grid->column('PFimages', __('PFimages'));
        $grid->column('doctor_id', __('Doctor id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('KQimages', __('KQimages'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Post::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('title', __('Title'));
        $show->field('ZXimages', __('ZXimages'));
        $show->field('WCimages', __('WCimages'));
        $show->field('PFimages', __('PFimages'));
        $show->field('doctor_id', __('Doctor id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('KQimages', __('KQimages'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Post());

        $form->text('title', "顾客姓名");
        $form->multipleImage('ZXimages', "整形图片");
        $form->multipleImage('PFimages', "皮肤图片");
        $form->multipleImage('WCimages', "无创图片");
        $form->multipleImage('KQimages', "口腔图片");
        $form->belongsTo('user_id',Users::class,'对应咨询');
        return $form;
    }
}
