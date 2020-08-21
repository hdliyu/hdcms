<?php

namespace Modules\Edu\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Edu\Entities\Sign;

class SignPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Sign $sign)
    {
        return $user['id'] === $sign['user_id'] || is_admin();
    }
}
