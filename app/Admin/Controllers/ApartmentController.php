<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use App\Models\Apartment;
use App\Models\Complex;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ApartmentController extends AdminController
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
        $grid = new Grid(new Apartment);

        $grid->column('id', __('ID'))->sortable();
        $grid->column('complex.id', __('complex_id'));
        $grid->column('number_of_rooms', __('number_of_rooms'));
        $grid->column('cost', __('cost'));
        $grid->column('total_area', __('total_area'));
        $grid->column('living_area', __('living_area'));
        $grid->column('media', __('media'));
        $grid->column('status', __('status'));

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
        $show = new Show(Apartment::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('complex.id', __('complex_id'));
        $show->field('number_of_rooms', __('number_of_rooms'));
        $show->field('cost', __('cost'));
        $show->field('total_area', __('total_area'));
        $show->field('living_area', __('living_area'));
        $show->field('media', __('media'));
        $show->field('status', __('status'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Apartment);

        $currentLanguage = app()->getLocale();

        // $form->display('id', __('ID'));
        // $form->select('complex_id', __('Complex'))->options(Complex::all()->pluck('name', 'id'));
        $form->text('slug', __('slug'));
        $form->select('complex_id', __('Complex'))
            ->options(Complex::all()->pluck('slug','id'));
        $form->text('number_of_rooms', __('number_of_rooms'));
        $form->currency('cost', __('cost'));
        $form->text('total_area', __('total_area'));
        $form->text('living_area', __('living_area'));
        $form->text('media', __('media'));
        $form->text('status', __('status'));

        $form->hidden('content.lang')->value($currentLanguage);
        $form->text('content.name', __('name-' . $currentLanguage));
        $form->textarea('content.description', __('description-' . $currentLanguage));

        return $form;
    }
}