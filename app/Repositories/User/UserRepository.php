<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Set model database
     *
     * @return mixed|string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Get list user
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllUsers()
    {
        return $this->model->all();
    }

    /**
     * Create user
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update user
     *
     * @param array $data
     * @param $id
     * @return bool|mixed|null
     */
    public function update($id, array $data)
    {
        $user = $this->model->find($id);

        if (!$user) {
            return null;
        }

        $user->update($data);

        return $user;
    }

    /**
     * Show user
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->model->find($id);
    }
}
