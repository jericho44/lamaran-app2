<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces;
use App\Repositories;
use Dotenv\Repository\RepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Interfaces\SkillInterface::class, Repositories\SkillRepository::class);
        $this->app->bind(Interfaces\JobInterface::class, Repositories\JobRepository::class);
        $this->app->bind(Interfaces\CandidateInterface::class, Repositories\CandidateRepository::class);
    }
}
