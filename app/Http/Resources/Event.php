<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
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
            'id' => $this->id,
            'category' => [
                'id' => $this->categories->id,
                'name' =>  $this->categories->name,
                'image' => url('/') .'/images/' . $this->categories->image,
                'category_map_marker' => url('/') .'/images/' .$this->categories->category_map_marker
            ],
            'name' => $this->name,
            'place' => $this->place,
            'latitude' => $this->latitude,
            'logitude' => $this->logitude,
            'start_date' => $this->required,
            'end_date' => $this->end_date,
            'start_time' => $this->start_time,
            'end_time'  => $this->end_time,
            'image' => url('/') .'/images/' .$this->image,
        ];
    }
}
