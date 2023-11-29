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
        $grid->column('trname.value', __('Name'));
        $grid->column('slug', __('Slug'));
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
        $show->field('country.slug', __('Country'));
        $show->field('slug', __('Slug'));
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

        $currentLanguage = app()->getLocale();

        // $form->saving(function (Form $form) {

        //     var_dump($form->trdescription['column_name'] = 'asdf');
        //     die;
        //     $currentLanguage = app()->getLocale();
        //     // $form['trname']['locale'] = $currentLanguage;
        //     // $form->trname['column_name'] = 'description';

        //     $form->model()->trname->locale = $currentLanguage;
        //     $form->model()->trname->column_name = 'description';

        //     // Fetch or create the trdescription relationship
        //     $trdescription = $form->model()->trdescription;
        //     $trdescription->locale = $currentLanguage;
        //     $trdescription->column_name = 'description';

        //     // Assign the value from the form
        //     $trdescription->value = $form->trdescription['value'];

        //     // Associate the translation with the city
        //     $form->model()->trdescription()->associate($trdescription);
        
        // });        

        $form->select('country_id', __('country_id'))
            ->options(Country::all()->pluck('name','id'));
        $form->text('slug', __('Slug'));
        $form->hidden('trname.locale')->value($currentLanguage);
        $form->hidden('trname.column_name')->value('name');
        $form->text('trname.value', __('Name'));
        $form->hidden('trdescription.locale')->value($currentLanguage);
        $form->hidden('trdescription.column_name')->value('description');
        $form->textarea('trdescription.value', __('Description'));
        $form->text('latitude', __('latitude'));
        $form->text('longitude', __('longitude'));
        // $form->text('media', __('Media'));

        $form->multipleImage('media', __('Images'))
            ->removable()
            // ->sortable()
            ->disk('admin')
            ->move('images/city')
            ->rules('image');
        // $form->multipleImage('media', __('Images'))->disk('public')->removable()->rules('image');

        // $form->multipleImage('media', __('Images'))
        //     ->disk('public') // specify the disk to store images
        //     ->removable();

        // $form->saving(function (Form $form) {
        //     var_dump($form->media);
        //     die;
            
        //     if ($form->images) {
        //         $form->images = json_encode($form->images);
        //     }
        // });

        // Handle the edit form
        // $form->editing(function (Form $form) {
        //     var_dump(json_decode($form->model()->media));
        //     die;
            
        //     if (is_string($form->model()->media)) {
        //         // Decode the JSON string back into an array
        //         $form->model()->media = json_decode($form->model()->media, true);
        //     }
        // });

        return $form;
    }
}
