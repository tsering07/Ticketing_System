<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;

    protected $fillable = [
    'sub', 'details', 'urgency', 'dep', 'fname', 'aname','status', 'remarks','image'
];
    public function remarks()
    {
        return $this->hasMany(Remark::class)->latest(); // latest first
    }
    public function ticket()
{
    return $this->belongsTo(Ticket::class);
}
}
