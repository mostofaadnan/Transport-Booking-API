<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'schedule_date',
        'start_time_id',
        'start_point_id',
        'end_point_id',
        'bus_id',
        'stuff_id',
        'ticket_type_id',
        'arriable_status',
        'status',
        'Note',

    ];

    public function StartTime()
    {
        return $this->belongsto(TimeSchedule::class, 'start_time_id');
    }
    public function RouteInfo()
    {
        return $this->belongsto(Route_Description::class, 'route_id');
    }
    public function BusInfo()
    {
        return $this->belongsto(BusInfo::class, 'bus_id');
    }
    public function DriverInfo()
    {
        return $this->belongsto(StuffInfo::class, 'stuff_id');
    }
    public function TicketInfo()
    {
        return $this->belongsto(TicketPrice::class, 'ticket_type_id');
    }
}
