<?php

namespace App\Admin\Controllers;

use App\Models\News;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NewsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'News';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new News());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('trtitle.value', __('Name'));
        $grid->column('status', __('status'));

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
        $show = new Show(News::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new News());

        // $form->saving(function (Form $form) {
        //     dd($form?->model()?->slug);
        // });

        $form->text('slug', __('slug'))->rules('required|string|max:255|unique:news,slug');
        $form->hidden('trtitle.locale')->value(app()->getLocale());
        $form->hidden('trtitle.column_name')->value('title');
        $form->text('trtitle.value', __('title'));
        $form->hidden('trexcerpt.locale')->value(app()->getLocale());
        $form->hidden('trexcerpt.column_name')->value('excerpt');
        $form->text('trexcerpt.value', __('excerpt'));
        $form->image('image', __('Image'))
            ->disk('admin')
            ->move("images/news") // {}
            ->rules('image');

        $form->radio('status')->options([
            '0' => 'не показывать',
            '1' => 'не индексировать',
            '2' => 'индексировать',
        ])->default('0');

        // $form->radio('indexed')->options([
        //     '0' => 'не индексировать',
        //     '1' => 'индексировать',
        // ])->default('0');

        $form->hasMany('contents', function (Form\NestedForm $form) {
            $form->hidden('lang')->value(app()->getLocale());
            $form->textarea('content');
            $form->select('text_type', __('text_type'))->options([
                'one' => '1 colunm',
                'two' => '2 colunm',
            ]);
            // $form->select('media_type', __('media_type'))->options([
            //     'down' => 'image down',
            //     'up' => 'image up',
            //     'left' => 'image left',
            //     'right' => 'image right',
            // ]);
            $form->image('image', __('Image'))
                ->disk('admin')
                ->move("images/news") // {}
                ->rules('image');
            // $form->multipleImage('gallery', __('gallery'))
            //     ->removable()
            //     ->disk('admin')
            //     ->move("images/news") // {}
            //     ->rules('image');
            // $form->list('video', __('video'));
        });

        $form->hidden('seo.lang')->value(app()->getLocale());
        $form->text('seo.meta_title');
        $form->textarea('seo.meta_description');
        $form->text('seo.keywords');

        return $form;
    }
}
