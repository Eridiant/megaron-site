<?php

namespace App\Admin\Controllers;

use App\Models\Neighborhood;
use App\Models\City;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NeighborhoodController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Neighborhood';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Neighborhood());

        $grid->column('id', __('Id'));
        $grid->column('city.slug', __('City'));
        $grid->column('slug', __('slug'));
        $grid->column('media', __('Media'));

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
        $show = new Show(Neighborhood::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('trname.value', __('City'));
        $show->field('slug', __('slug'));
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
        $form = new Form(new Neighborhood());

        $currentLanguage = app()->getLocale();

        $form->select('city_id', __('City'))
            ->options(City::all()->pluck('slug','id'));
            // ->options(City::all()->pluck('trname.value','id'));
        $form->text('slug', __('slug'));
        $form->hidden('trname.locale')->value($currentLanguage);
        $form->hidden('trname.column_name')->value('name');
        $form->text('trname.value', __('Name'));
        $form->hidden('trdescription.locale')->value($currentLanguage);
        $form->hidden('trdescription.column_name')->value('description');
        $form->textarea('trdescription.value', __('Description'));
        $form->text('latitude', __('latitude'));
        $form->text('longitude', __('longitude'));
        $form->textarea('polygon', __('Polygon'));

        $form->multipleImage('media', __('Images'))
            ->removable()
            // ->sortable()
            ->disk('admin')
            ->move('images/neighborhood')
            ->rules('image');

        return $form;
    }
}
