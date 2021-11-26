<?php


namespace App\Admin\Controllers;


use App\Models\Member;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

        $grid->column('name', trans('이름'));
        $grid->column('phone', trans('핸드폰번호'));
        $grid->column('insurance', trans('4대보험유무'));
        $grid->column('income', trans('연봉'))->display(function (){
            return number_format($this->income)."만원";
        });
        $grid->column('loan_amount', trans('총부채금액'))->display(function (){
            return number_format($this->loan_amount)."만원";
        });
        $grid->column('overdue', trans('최근연체유무'));
        $grid->column('created_at', trans('등록일자'))->display(function (){
            return date('Y-m-d H:i:s', strtotime($this->created_at));
        });
        $grid->column('updated_at', trans('변경일자'))->display(function (){
            return date('Y-m-d H:i:s', strtotime($this->updated_at));
        });

        return $grid;
    }

}
