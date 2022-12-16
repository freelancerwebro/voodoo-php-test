<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Jobs\LogRandomUser;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class RandomUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(
        Request $request,
        UserRepositoryInterface $repository
    ) {

        LogRandomUser::dispatch($repository);

        return response([
            'OK',
        ], 200);
    }
}
