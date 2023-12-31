<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use App\Models\Apartment;
use App\Models\Complex;
use App\Models\EstateType;
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
        $grid->column('complex.slug', __('complex'));
        $grid->column('number_of_rooms', __('number_of_rooms'));
        $grid->column('cost', __('cost'));
        $grid->column('total_area', __('total_area'));
        $grid->column('living_area', __('living_area'));
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
        $form->text('number_of_bedrooms', __('number_of_bedrooms'));
        $form->text('number_of_bathrooms', __('number_of_bathrooms'));
        $form->select('type', __('Type'))
            ->options(EstateType::all()->pluck('name', 'id'));
        $form->currency('cost', __('cost'));
        $form->text('total_area', __('total_area'));
        $form->text('living_area', __('living_area'));

        $form->hidden('content.lang')->value($currentLanguage);
        $form->text('content.name', __('name-' . $currentLanguage));
        $form->textarea('content.description', __('description-' . $currentLanguage));
        $form->textarea('content.meta_title', __('meta_title-' . $currentLanguage));
        $form->textarea('content.meta_description', __('meta_description-' . $currentLanguage));

        $form->radio('property_type')->options([
            '1' => 'первичка',
            '2' => 'вторичка',
        ])->default('1');

        $form->radio('status')->options([
            '0' => 'на проверке',
            '1' => 'заблокировано',
            '4' => 'продано',
            '5' => 'не отображать',
            '9' => 'активно'
        ])->default('9');

        $form->image('image', __('Image'))
            ->disk('admin')
            ->move('images/apartment')
            ->rules('image');
        $form->list('common_video', __('Videos'));
        $form->multipleImage('media', __('Images'))
            ->removable()
            // ->sortable()
            ->disk('admin')
            ->move('images/apartment')
            ->rules('image');

        return $form;
    }
}