<?php

namespace App\Repositories;

use App\Interfaces\JobInterface;
use App\Models\Job;
use Illuminate\Support\Str;

class JobRepository implements JobInterface
{
    public function findById($id, $withRelations = [], $method = 'findOrFail')
    {
        $job = Job::with($withRelations)->$method($id);

        return $job;
    }

    public function findByIdHash($id, $withRelations = [], $method = 'firstOrFail')
    {
        $job = Job::with($withRelations)->where('id', $id)->$method();

        return $job;
    }

    public function create($data)
    {
        $job = new Job();

        foreach ($data as $key => $value) {
            $job->$key = $value;
        }

        $job->save();

        return $job;
    }

    public function updateById($id, $data)
    {
        $job = $this->findById($id);

        foreach ($data as $key => $value) {
            $job->$key = $value;
        }

        $job->save();

        return $job;
    }

    public function updateByIdHash($id, $data)
    {
        $job = $this->findByIdHash($id);

        foreach ($data as $key => $value) {
            $job->$key = $value;
        }

        $job->save();

        return $job;
    }

    public function deletedById($id)
    {
        $hotel = $this->findById($id);

        return $hotel->delete();
    }
}
