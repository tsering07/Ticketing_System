<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
     protected $fillable = ['remarks', 'ticket_id'];
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

}
