<?php

namespace App\Jobs;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class LogRandomUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private User $user;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->user = $repository->getRandom();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (!empty($this->user)) {
            Log::info('USER = ', $this->user->toArray());
        } else {
            Log::error('No user to be logged');
        }
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
