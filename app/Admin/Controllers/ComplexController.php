<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use App\Models\City;
use App\Models\Complex;
use App\Models\Developer;
use App\Models\Neighborhood;
use App\Models\EstateType;
use App\Models\Apartment;
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
        // $grid->column('add_apartment', 'Add New')->display(function ($value, $column) {
        //     // Assuming you have an 'id' field in your model
        //     $id = 1; 
    
        //     // The route to your related model's create page
        //     // You can pass parameters using query strings
        //     $url = route('/apartment', ['param' => $id]);
    
        //     return "<a href='{$url}'>Add New Record</a>";
        // });

        // $grid->actions(function ($actions) {
            // $actions->disableDelete();
            // $actions->disableEdit();
            // $actions->disableView();
            // append an action.
            // $id = $actions->getKey();
            // $url = route('/admin/apartment', ['param' => $id]);
            // $actions->append("<a href='/apartment'>Cr</a>");
        
            // prepend an action.
            // $actions->prepend('<a href="/apartment">asdfasdf</a>');

            // $actions->append(new Apartment());
            // the array of data for the current row
            // $actions->row;

            // gets the current row primary key value
            // $actions->getKey();
        // });

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
        // dd($form);
        $currentLanguage = app()->getLocale();

        $form->text('slug', __('slug'));
        $form->date('delivery_date', __('Object delivery date'));
        $form->select('city_id', __('City'))
            ->options(City::all()->pluck('slug','id'));
        $form->select('neighborhood_id', __('neighborhood_id'))
            ->options(Neighborhood::all()->pluck('slug','id'));
        $form->select('developer_id', __('developer_id'))
            ->options(Developer::all()->pluck('slug','id'));
        $form->multipleSelect('types', __('types'))
            ->options(EstateType::all()->pluck('name','id'));
        // $form->latlong('latitude', 'longitude', 'Position');
        // $form->map('latitude', 'longitude', 'Position');

        $form->multipleSelect('number_of_rooms')->options([
            '0' => 'Студия',
            '1' => '1 комнатная',
            '2' => '2 комнатная',
            '3' => '3 комнатная',
            '4' => '4 комнатная',
            '5' => '5 комнатная',
        ]);

        $form->hidden('content.lang')->value($currentLanguage);
        $form->text('content.name', __('name-' . $currentLanguage));
        $form->textarea('content.description', __('description-' . $currentLanguage));
        // $form->json('content.video', __('video-' . $currentLanguage));
        // $form->listbox('content.videos', __('Videos'))
        //     ->options([]) // Start with an empty list
        //     ->settings([
        //         'onAdd' => 'function(itemValue) { return itemValue; }', // Handle adding new items
        //         'selectorMinimalHeight' => 300
        //     ]);

        $form->textarea('content.meta_title', __('meta_title-' . $currentLanguage));
        $form->textarea('content.meta_description', __('meta_description-' . $currentLanguage));

        $form->radio('status')->options([
            '0' => 'на проверке',
            '1' => 'заблокировано',
            '5' => 'не отображать',
            '9' => 'активно'
        ])->default('9');

        // $form->list('content.videos', __('Videoz'));
        $form->image('image', __('Image'))
            ->disk('admin')
            ->move('images/apartment')
            ->rules('image');
        $form->list('common_video', __('Videos'));
        $form->multipleImage('media', __('Images'))
            ->removable()
            // ->sortable()
            ->disk('admin')
            ->move('images/complex')
            ->rules('image');

        return $form;
    }
}