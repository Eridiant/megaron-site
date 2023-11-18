<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use App\Models\Message;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MessageController extends AdminController
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
        $grid = new Grid(new Message);

        $grid->column('id', __('ID'))->sortable();
        $grid->column('lang', __('lang'));
        $grid->column('country', __('country'));
        $grid->column('phone', __('phone'));
        $grid->column('communicate', __('communicate'));
        $grid->column('spam')->display(function ($spam) {
            if ($spam <= 2) {
                return "<span class='label label-success'>не спам</span>";
            } else if($spam > 7) {
                return "<span class='label label-warning'>спам??</span>";
            } else {
                return "<span class='label label-danger'>спам</span>";
            }
            
        });
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Message::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('lang', __('lang'));
        $show->field('country', __('country'));
        $show->field('phone', __('phone'));
        $show->field('communicate', __('communicate'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Message);

        $form->display('id', __('ID'));
        $form->display('lang', __('lang'));
        $form->display('country', __('country'));
        $form->display('phone', __('phone'));
        $form->display('communicate', __('communicate'));
        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
