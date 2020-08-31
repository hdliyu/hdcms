<?php

namespace Modules\Edu\Entities\Traits;
use Modules\Edu\Entities\Study as Model;

trait Study
{
    public function study()
    {
        return Model::latest('updated_at')->take(10)->get();
    }
}
