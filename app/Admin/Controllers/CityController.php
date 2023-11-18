<?php

namespace App\Admin\Controllers;

use App\Models\City;
use App\Models\Country;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CityController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'City';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new City());

        $grid->column('id', __('Id'));
        $grid->column('country.name', __('Country'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('location', __('Location'));
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
        $show = new Show(City::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('country.name', __('Country'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('location', __('Location'));
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
        $form = new Form(new City());

        $form->select('country_id', __('neighborhood_id'))
            ->options(Country::all()->pluck('name','id'));
        $form->text('name', __('Name'));
        $form->textarea('description', __('Description'));
        $form->text('location', __('Location'));
        $form->text('media', __('Media'));

        return $form;
    }
}
