<?php


namespace App\Game\Users;


use App\Models\User;
use Tightenco\Parental\HasParent;

class Multihunter extends User
{
    use HasParent;
}