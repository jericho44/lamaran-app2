<?php

namespace App\Repositories;

use App\Interfaces\CandidateInterface;
use App\Models\Skill;
use Illuminate\Support\Str;

class CandidateRepository implements CandidateInterface
{
    public function findById($id, $withRelations = [], $method = 'findOrFail')
    {
        $skill = Skill::with($withRelations)->$method($id);

        return $skill;
    }

    public function findByIdHash($id, $withRelations = [], $method = 'firstOrFail')
    {
        $skill = Skill::with($withRelations)->where('id', $id)->$method();

        return $skill;
    }

    public function create($data)
    {
        $skill = new Skill();

        foreach ($data as $key => $value) {
            $skill->$key = $value;
        }

        $skill->save();

        return $skill;
    }

    public function updateById($id, $data)
    {
        $skill = $this->findById($id);

        foreach ($data as $key => $value) {
            $skill->$key = $value;
        }

        $skill->save();

        return $skill;
    }

    public function updateByIdHash($id, $data)
    {
        $skill = $this->findByIdHash($id);

        foreach ($data as $key => $value) {
            $skill->$key = $value;
        }

        $skill->save();

        return $skill;
    }
}
