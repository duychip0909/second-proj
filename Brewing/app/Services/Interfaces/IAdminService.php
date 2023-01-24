<?php

namespace App\Services\Interfaces;

interface IAdminService
{
    function processRegister($data);

    function check($data);
}
