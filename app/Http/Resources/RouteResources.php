<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RouteResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'startting_point' => $this->startting_point,
            'starting_station' => $this->starting_station,
            'ending_point' => $this->ending_point,
            'ending_station' => $this->ending_station,
            'status' => $this->status==1?'Active':'Inactive',

        ];
    }
}
