<?php

namespace App\Admin\Controllers;

use App\Models\category;
use App\Models\product;
use App\Models\stock;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new product());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('quantity_in_stock', __('Quantity in stock'));
        $grid->column('price', __('Price'));
        $grid->column('properties', __('Properties'));
        $grid->column('stock_id', __('Stock id'));
        $grid->column('category_id', __('Category id'));
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
        $show = new Show(product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('quantity_in_stock', __('Quantity in stock'));
        $show->field('price', __('Price'));
        $show->field('properties', __('Properties'));
        $show->field('stock_id', __('Stock id'));
        $show->field('category_id', __('Category id'));
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
        $form = new Form(new product());

        $form->text('name', __('Name'));
        $form->text('description', __('Description'));
        $form->number('quantity_in_stock', __('Quantity in stock'));
        $form->decimal('price', __('Price'));
        $form->textarea('properties', __('Properties'));
        $form->select('stock_id', __('Stock id'))->options(stock::all()->pluck('name', 'id'));
        $form->select('category_id', __('Category id'))->options(category::all()->pluck('name', 'id'));

        return $form;
    }
}
