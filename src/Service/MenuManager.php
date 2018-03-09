<?php

namespace App\Service;

class MenuManager
{
    public function navbarLinks(): array
    {
        return [
            'app_main_index' => 'main.index.title',
            'app_worker_index' => 'worker.index.title',
            'app_job_index' => 'job.index.title',
        ];
    }
}
