<?php

namespace Modules\Edu\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Edu\Entities\System;

class SystemPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if (access('system', false)) {
            return true;
        }
    }

    public function edit(User $user, System $system)
    {
        return $user['id'] == $system['user_id'];
    }
}
