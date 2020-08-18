<?php

namespace Modules\Edu\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        $comment = parent::toArray($request);
        $comment['user'] = new UserResource($this->user);
        $comment['html'] = $this->html;
        return $comment;
    }
}
