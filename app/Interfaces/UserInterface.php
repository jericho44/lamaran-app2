<?php

namespace App\Interfaces;

interface UserInterface
{
    public function findById($id, $method = 'findOrFail');
    public function findByIdHash($id, $method = 'firstOrFail');
}
