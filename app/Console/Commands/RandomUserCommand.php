<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Jobs\LogRandomUser;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Console\Command;

class RandomUserCommand extends Command
{
    public function __construct(private UserRepositoryInterface $repository) {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:users:random';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate random user from DB and log to file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        LogRandomUser::dispatch($this->repository);

        return Command::SUCCESS;
    }
}
