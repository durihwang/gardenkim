<?php


namespace App\Providers;


use App\Repository\DefaultMemberRepository;
use App\Repository\MemberRepository;
use Illuminate\Support\ServiceProvider;

class MemberServiceProvider extends ServiceProvider
{
    public $bindings = [
        MemberRepository::class => DefaultMemberRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
