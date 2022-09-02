<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
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
            'schedule_date' => $this->schedule_date,
            'start_time' => $this->StartTime->time,
            'route' => $this->RouteInfo->startting_point . '-' . $this->RouteInfo->ending_point,
            'bus-info' => $this->BusInfo->bus_number,
            'Stuff' => $this->DriverInfo->name,
            'Ticket_type' => $this->TicketInfo->ticket_type,
            'Ticket_Price' => $this->TicketInfo->price,
            'arriable_status' => $this->arriable_status == 1 ? 'Wating' : 'Complete',
            'status' => $this->status == 1 ? 'Active' : 'Inactive',

        ];
    }
}
