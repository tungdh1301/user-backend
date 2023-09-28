<?php

namespace App\Repositories\CheckIn;

use App\Models\Checkin;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class CheckInRepository extends BaseRepository
{
    /**
     * Set model database
     *
     * @return string
     */
    public function model()
    {
        return Checkin::class;
    }

    /**
     * Get list company
     *
     * @return Collection
     */
    public function getAll()
    {
        return $this->model
            ->with('employee')
            ->get();
    }

    /**
     * Create checkin
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $today = now();
        $isCheckin = $this->model
            ->whereDate('created_at', $today)
            ->where('employee_id', $data['employee_id'])
            ->orderBy('created_at', 'desc')->first()->is_checkin;

        if (!$isCheckin) {
            $data['is_checkin'] = true;
            $this->model->create($data);

            return 'check in';
        }

        $this->model->create($data);

        return 'check out';
    }
}
