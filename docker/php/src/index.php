<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Services\UsersService;

$usersService = new UsersService();
$user = $usersService->create();
$userReflection = new ReflectionClass($user);

foreach($userReflection->getMethods() as $method)
{
    echo $method->getName();
}