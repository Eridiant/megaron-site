<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use App\Models\City;
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
        $grid->column('city.slug', __('city'));
        $grid->column('neighborhood.slug', __('neighborhood'));
        $grid->column('developer.slug', __('developer'));
        $grid->column('media', __('media'));
        $grid->column('status', __('status'));
        $grid->column('rank', __('rating'));

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
        $show->field('neighborhood.slug', __('neighborhood'));
        $show->field('developer.name', __('developer'));
        $show->field('media', __('media'));

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

        $form->text('slug', __('slug'));
        $form->select('city_id', __('City'))
            ->options(City::all()->pluck('slug','id'));
        $form->select('neighborhood_id', __('neighborhood_id'))
            ->options(Neighborhood::all()->pluck('slug','id'));
        $form->select('developer_id', __('developer_id'))
            ->options(Developer::all()->pluck('slug','id'));
        $form->latlong('latitude', 'longitude', 'Position');

        $form->hidden('content.lang')->value($currentLanguage);
        $form->text('content.name', __('name-' . $currentLanguage));
        $form->textarea('content.description', __('description-' . $currentLanguage));
        $form->textarea('content.meta_title', __('meta_title-' . $currentLanguage));
        $form->textarea('content.meta_description', __('meta_description-' . $currentLanguage));

        $form->radio('status')->options([
            '0' => 'на проверке',
            '1' => 'заблокировано',
            '5' => 'не отображать',
            '9' => 'активно'
        ])->default('9');

        $form->multipleImage('media', __('Images'))
            ->removable()
            // ->sortable()
            ->disk('admin')
            ->move('images/complex')
            ->rules('image');

        return $form;
    }
}