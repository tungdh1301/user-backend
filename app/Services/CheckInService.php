<?php

namespace App\Services;

use App\Repositories\CheckIn\CheckInRepository;

class CheckInService
{
    protected $checkinRepository;

    public function __construct(CheckInRepository $checkinRepository)
    {
        $this->checkinRepository = $checkinRepository;
    }

    public function getAll()
    {
        return $this->checkinRepository->getAll();
    }

    public function create(array $data)
    {
        return $this->checkinRepository->create($data);
    }
}
