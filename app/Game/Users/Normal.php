<?php


namespace App\Game\Users;


use App\Models\User;
use Tightenco\Parental\HasParent;

class Normal extends User
{
    use HasParent;
}