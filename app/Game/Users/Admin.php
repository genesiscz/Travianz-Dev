<?php


namespace App\Game\Users;


use App\Models\User;
use Tightenco\Parental\HasParent;

final class Admin extends User
{
    use HasParent;
}
