<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use App\Models\Complex;
use App\Models\Developer;
use App\Models\Neighborhood;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ComplexController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Example controller';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Complex);

        $grid->column('id', __('ID'))->sortable();
        $grid->column('neighborhood.name', __('neighborhood'));
        $grid->column('developer.name', __('developer'));
        $grid->column('media', __('media'));
        $grid->column('location', __('location'));

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
        $show = new Show(Complex::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('neighborhood.name', __('neighborhood'));
        $show->field('developer.name', __('developer'));
        $show->field('media', __('media'));
        $show->field('location', __('location'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Complex);

        $currentLanguage = app()->getLocale();

        // $form->display('id', __('ID'));
        $form->select('neighborhood_id', __('neighborhood_id'))
            ->options(Neighborhood::all()->pluck('name','id'));
        $form->select('developer_id', __('developer_id'))
            ->options(Developer::all()->pluck('name','id'));
        // $form->keyValue('media')->rules('required|min:2');
        $form->text('media', __('media'));
        $form->textarea('location', __('location'));

        $form->hidden('content.lang')->value($currentLanguage);
        $form->text('content.name', __('name-' . $currentLanguage));
        $form->textarea('content.description', __('description-' . $currentLanguage));

        return $form;
    }
}