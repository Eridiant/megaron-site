<?php

namespace App\Admin\Controllers;

use App\Models\Developer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DeveloperController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Developer';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Developer());

        $grid->column('id', __('Id'));
        $grid->column('trname.value', __('Name'));
        $grid->column('date_of_creation', __('Date of creation'));
        $grid->column('completed_objects', __('Completed objects'));
        $grid->column('total_objects', __('Total objects'));
        $grid->column('media', __('Media'));
        // $grid->column('description', __('Description'));

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
        $show = new Show(Developer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('date_of_creation', __('Date of creation'));
        $show->field('completed_objects', __('Completed objects'));
        $show->field('total_objects', __('Total objects'));
        $show->field('media', __('Media'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Developer());

        $currentLanguage = app()->getLocale();

        $form->text('slug', __('slug'));
        $form->hidden('trname.locale')->value($currentLanguage);
        $form->hidden('trname.column_name')->value('name');
        $form->text('trname.value', __('Name'));
        $form->date('date_of_creation', __('Date of creation'));
        $form->text('latitude', __('latitude'));
        $form->text('longitude', __('longitude'));
        $form->text('completed_objects', __('Completed objects'));
        $form->text('total_objects', __('Total objects'));
        $form->hidden('trdescription.locale')->value($currentLanguage);
        $form->hidden('trdescription.column_name')->value('description');
        $form->textarea('trdescription.value', __('Description'));

        $form->multipleImage('media', __('Images'))
            ->removable()
            ->disk('admin')
            ->move('images/developer')
            ->rules('image');

        return $form;
    }
}
