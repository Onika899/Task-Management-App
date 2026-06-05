<?php

namespace App\Providers;

<<<<<<< HEAD
use App\Models\TaskJS;
use App\Policies\TaskPolicyJS;
use Illuminate\Support\Facades\Gate;
=======
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
<<<<<<< HEAD
     */
    public function register(): void
=======
     *
     * @return void
     */
    public function register()
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    {
        //
    }

    /**
     * Bootstrap any application services.
<<<<<<< HEAD
     */
    public function boot(): void
    {
        Gate::policy(TaskJS::class, TaskPolicyJS::class);
=======
     *
     * @return void
     */
    public function boot()
    {
        //
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
    }
}
