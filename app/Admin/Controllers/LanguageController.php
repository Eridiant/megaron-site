<?php

namespace App\Admin\Controllers;

use App\Models\Language;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LanguageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Language';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Language());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('key', __('Key'));
        $grid->column('code', __('Code'));
        $grid->column('default', __('Default'));
        $grid->column('active', __('Active'));
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
        $show = new Show(Language::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('key', __('Key'));
        $show->field('code', __('Code'));
        $show->field('default', __('Default'));
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
        $form = new Form(new Language());

        $form->text('name', __('Name'));
        $form->text('key', __('Key'));
        $form->text('code', __('Code'));
        // $form->switch('default', __('Default'));
        $form->switch('active', __('Active'))->value(1);

        return $form;
    }
}
