<?php

namespace App\Admin\Controllers;

use App\CKName;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CKNameController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'CKNames';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CKName);

        $grid->column('id', __('Id'));
        $grid->column('idol_id', __('Idol id'));
        $grid->column('name_zh', __('Name zh'));
        $grid->column('name_ko', __('Name ko'));
        $grid->column('name_zh_separate', __('Name zh separate'));
        $grid->column('name_ko_separate', __('Name ko separate'));
        $grid->column('subname_zh', __('Subname zh'));
        $grid->column('subname_ko', __('Subname ko'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(CKName::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('idol_id', __('Idol id'));
        $show->field('name_zh', __('Name zh'));
        $show->field('name_ko', __('Name ko'));
        $show->field('name_zh_separate', __('Name zh separate'));
        $show->field('name_ko_separate', __('Name ko separate'));
        $show->field('subname_zh', __('Subname zh'));
        $show->field('subname_ko', __('Subname ko'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CKName);

        $form->number('idol_id', __('Idol id'));
        $form->textarea('name_zh', __('Name zh'));
        $form->textarea('name_ko', __('Name ko'));
        $form->number('name_zh_separate', __('Name zh separate'));
        $form->number('name_ko_separate', __('Name ko separate'));
        $form->textarea('subname_zh', __('Subname zh'));
        $form->textarea('subname_ko', __('Subname ko'));

        return $form;
    }
}
