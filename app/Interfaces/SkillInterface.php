<?php

namespace App\Interfaces;

interface SkillInterface
{
    public function findById($id, $method = 'findOrFail');
    public function findByIdHash($id, $method = 'firstOrFail');
    public function create($data);
    public function updateById($id, $data);
    public function updateByIdHash($id, $data);
    public function deletedById($id);
    // public function deletedByIdHash($id);
}
