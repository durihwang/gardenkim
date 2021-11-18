<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Repository\MemberRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * @var MemberRepository
     */
    private $member_repository;

    /**
     * MemberController constructor.
     */
    public function __construct(MemberRepository $member_repository)
    {
        $this->member_repository = $member_repository;
    }


    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('index');
    }

    public function complete()
    {
        return view('complete');
    }

    /**
     * @param Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $phone = $request->get('tel1') . "-" . $request->get('tel2') . "-" . $request->get('tel3');
        if ($request->get('overdue') == "있음") {
            $overdue = "Y";
        } else {
            $overdue = "N";
        }
        if ($request->get('insurance') == "가입") {
            $insurance = "Y";
        } else {
            $insurance = "N";
        }

        $builder = Member::createBuilder()
            ->setRole('user')
            ->setName($request->get('name'))
            ->setIncome($request->get('income'))
            ->setLoanAmount($request->get('debt'))
            ->setPhone($phone)
            ->setInsurance($insurance)
            ->setOverdue($overdue)
            ->build();

        DB::transaction(
            function () use ($builder) {
                $this->member_repository->save($builder);
            }
        );

        return redirect('/complete');
    }
}
