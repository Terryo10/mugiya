<?php

namespace App\Admin\Controllers;

use App\Models\Expenses;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\stock;

class ExpensesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Expenses';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Expenses());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('amount_of_expense', __('Amount of expense'));
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
        $show = new Show(Expenses::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('amount_of_expense', __('Amount of expense'));
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
        $form = new Form(new Expenses());

        $form->text('name', __('Name'));
        $form->decimal('amount_of_expense', __('Amount of expense'));
        $form->select('stock_id', __('Stock id'))->options(stock::all()->pluck('name', 'id'));

        return $form;
    }
}
