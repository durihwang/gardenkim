<?php


namespace App\Repository;


use App\Models\Member;
use Illuminate\Support\Facades\DB;

class DefaultMemberRepository implements MemberRepository
{

    public function find()
    {
        return Member::query()
            ->get();
    }

    public function save(Member $member)
    {
        $member->save();
    }
}
