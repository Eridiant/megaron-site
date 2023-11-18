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
        $grid->column('city.name', __('City'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('location', __('Location'));
        $grid->column('polygon', __('Polygon'));
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
        $show->field('city.name', __('City'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('location', __('Location'));
        $show->field('polygon', __('Polygon'));
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

        $form->select('city_id', __('City'))
            ->options(City::all()->pluck('name','id'));
        $form->text('name', __('Name'));
        $form->textarea('description', __('Description'));
        $form->text('location', __('Location'));
        $form->textarea('polygon', __('Polygon'));
        $form->text('media', __('Media'));

        return $form;
    }
}
