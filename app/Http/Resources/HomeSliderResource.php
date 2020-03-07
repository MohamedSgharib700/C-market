<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\Resource;

class HomeSliderResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => $this->image,
 
        ];
    }
}
