<?php


namespace App\Admin\Controllers;


use App\Models\Member;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Hash;

class MemberController extends AdminController
{
    /**
     * {@inheritdoc}
     */
    protected function title()
    {
        return trans('Members');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Member());

        $grid->column('name', trans('name'));
        $grid->column('phone', trans('phone'));
        $grid->column('insurance', trans('insurance'));
        $grid->column('income', trans('income'))->display(function (){
            return number_format($this->income);
        });
        $grid->column('loan_amount', trans('loan_amount'))->display(function (){
            return number_format($this->loan_amount);
        });
        $grid->column('overdue', trans('overdue'));
        $grid->column('created_at', trans('admin.created_at'));
        $grid->column('updated_at', trans('admin.updated_at'));

        return $grid;
    }

}
