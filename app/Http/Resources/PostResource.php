<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/* è generata tramite il comando php artisan make:resource PostResource */
/* Resource trasforma un Model in JSON */

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
