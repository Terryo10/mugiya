<?php

namespace App\Admin\Controllers;

use App\Models\Debt;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DebtController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Debt';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Debt());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('phone_number', __('Phone number'));
        $grid->column('amount_paid', __('Amount paid'));
        $grid->column('amount_in_debt', __('Amount in debt'));
        $grid->column('stock_id', __('Stock id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Debt::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('phone_number', __('Phone number'));
        $show->field('amount_paid', __('Amount paid'));
        $show->field('amount_in_debt', __('Amount in debt'));
        $show->field('stock_id', __('Stock id'));
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
        $form = new Form(new Debt());

        $form->text('name', __('Name'));
        $form->text('phone_number', __('Phone number'));
        $form->decimal('amount_paid', __('Amount paid'));
        $form->decimal('amount_in_debt', __('Amount in debt'));
        $form->number('stock_id', __('Stock id'));

        return $form;
    }
}
