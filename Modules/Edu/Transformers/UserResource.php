<?php

namespace Modules\Edu\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $user['id'] = $this->id;
        $user['name'] = $this->name;
        $user['avatar'] = $this->avatar;
        return $user;
    }
}
