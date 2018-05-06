<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Customer extends Resource
{


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
             'id' => $this->resource->id,
             'first_name' => $this->resource->first_name,
             'last_name' => $this->resource->last_name,
        ];

    }
}
