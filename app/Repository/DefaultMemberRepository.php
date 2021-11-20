<?php


namespace App\Repository;


use App\Models\Member;
use Illuminate\Support\Facades\DB;

class DefaultMemberRepository implements MemberRepository
{

    public function find()
    {
        // TODO: Implement find() method.
    }

    public function save(Member $member)
    {
        $member->save();
    }
}
