<?php


namespace App\Models;


use App\Models\Builder\MemberBuilder;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $table = "member";

    protected $fillable = [
        'name',
        'phone',
        'role',
        'income',
        'insurance',
        'loan_amount',
        'overdue',
    ];

    /**
     * @return MemberBuilder
     */
    public static function createBuilder(): MemberBuilder
    {
        return new MemberBuilder();
    }
}
