<?php

namespace Modules\Edu\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentCollection extends ResourceCollection
{
    public $collects = CommentResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function with($request)
    {
        return [
            'meta'=>[
                'is_admin'=>is_admin()  || access('comment_manage', false),
                'user'=>user(),
            ]
        ];
    }
}
