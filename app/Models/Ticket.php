<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;

    protected $fillable = [
    'sub', 'details', 'urgency', 'dep', 'fname', 'aname','status','deadline','image','ip_address'
];

    public function remarks()
    {
        return $this->hasMany(Remark::class); 
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // public function department(){
    //     return $this->belongsTo(Department::class);
    // }
}
