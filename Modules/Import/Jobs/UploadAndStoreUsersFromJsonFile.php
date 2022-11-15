<?php

namespace Modules\Import\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\User\DTOs\UserModelDTO;
use Modules\User\Repositories\Eloquent\EloquentUserRepository;

class UploadAndStoreUsersFromJsonFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param array $usersData
     * @return void
     */
    public function __construct(
        private array $usersData,
    )
    {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(EloquentUserRepository $eloquentUserRepository)
    {
        foreach ($this->usersData as $data){

            $dto = UserModelDTO::fromObject($data);

            if ($dto->age == 0 || $dto->age >= 18 && $dto->age <= 65){
                try {
                    $eloquentUserRepository->store($dto);
                }catch (\Exception $exception){
                    // Duplicate Email
                }
            }

        }
    }
}
