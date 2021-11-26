<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\MemberRepository;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    private $member_repository;

    /**
     * HomeController constructor.
     */
    public function __construct(MemberRepository $member_repository)
    {
        $this->member_repository = $member_repository;
    }

    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(Dashboard::title())
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }
}
