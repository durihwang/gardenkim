<?php


namespace App\Repository;


use App\Models\Member;

interface MemberRepository
{
    public function find();

    public function save(Member $member);
}
