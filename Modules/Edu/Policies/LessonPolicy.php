<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
    }

    public function before($user, $ability, $site = null)
    {
        if ($user->isSuperAdmin || site()->master->user_id == user('id')) {
            return true;
        }

        return access('lesson-index');
    }
}
