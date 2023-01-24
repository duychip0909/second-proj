<?php

namespace App\Repositories\Interfaces;

interface AdminRepositoryInterface
{
    function processRegister($data);

    function check($data);
}
