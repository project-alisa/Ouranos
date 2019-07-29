<?php

namespace App\Admin\Controllers;

use App\Idol;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class IdolController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'アイドル';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Idol);

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('name_y', __('Name y'));
        $grid->column('name_r', __('Name r'));
        $grid->column('subname', __('Subname'));
        $grid->column('name_separate', __('Name separate'));
        $grid->column('name_y_separate', __('Name y separate'));
        $grid->column('name_r_separate', __('Name r separate'));
        $grid->column('type', __('Type'));
        $grid->column('birthdate', __('Birthdate'));
        $grid->column('age', __('Age'));
        $grid->column('height', __('Height'));
        $grid->column('weight', __('Weight'));
        $grid->column('bloodtype', __('Blood type'));
        $grid->column('handedness', __('Handedness'));
        $grid->column('bust', __('Bust'));
        $grid->column('waist', __('Waist'));
        $grid->column('hip', __('Hip'));
        $grid->column('birthplace', __('Birthplace'));
        $grid->column('hobby', __('Hobby'));
        $grid->column('skill', __('Skill'));
        $grid->column('favorite', __('Favorite'));
        $grid->column('cv', __('CV'));
        $grid->column('color', __('Color'));
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
        $show = new Show(Idol::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('name_y', __('Name y'));
        $show->field('name_r', __('Name r'));
        $show->field('subname', __('Subname'));
        $show->field('name_separate', __('Name separate'));
        $show->field('name_y_separate', __('Name y separate'));
        $show->field('name_r_separate', __('Name r separate'));
        $show->field('type', __('Type'));
        $show->field('birthdate', __('Birthdate'));
        $show->field('age', __('Age'));
        $show->field('height', __('Height'));
        $show->field('weight', __('Weight'));
        $show->field('bloodtype', __('Blood type'));
        $show->field('handedness', __('Handedness'));
        $show->field('bust', __('Bust'));
        $show->field('waist', __('Waist'));
        $show->field('hip', __('Hip'));
        $show->field('birthplace', __('Birthplace'));
        $show->field('hobby', __('Hobby'));
        $show->field('skill', __('Skill'));
        $show->field('favorite', __('Favorite'));
        $show->field('cv', __('CV'));
        $show->field('color', __('Color'));
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
        $form = new Form(new Idol);

        $form->text('name', __('Name'));
        $form->text('name_y', __('Name y'));
        $form->text('name_r', __('Name r'));
        $form->text('subname', __('Subname'));
        $form->number('name_separate', __('Name separate'));
        $form->number('name_y_separate', __('Name y separate'));
        $form->number('name_r_separate', __('Name r separate'));
        $form->text('type', __('Type'));
        $form->date('birthdate', __('Birthdate'))->default(date('Y-m-d'));
        $form->number('age', __('Age'));
        $form->number('height', __('Height'));
        $form->decimal('weight', __('Weight'));
        $form->text('bloodtype', __('Blood type'));
        $form->text('handedness', __('Handedness'));
        $form->number('bust', __('Bust'));
        $form->number('waist', __('Waist'));
        $form->number('hip', __('Hip'));
        $form->text('birthplace', __('Birthplace'));
        $form->text('hobby', __('Hobby'));
        $form->text('skill', __('Skill'));
        $form->text('favorite', __('Favorite'));
        $form->text('cv', __('CV'));
        $form->color('color', __('Color'))->hex();

        return $form;
    }
}
