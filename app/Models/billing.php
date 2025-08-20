<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class billing extends Model
{
    use HasFactory;

    protected $table = 'billing';

    protected $fillable = [
        'client_id',
        'reading_date',
        'due_date',
        'total',
        'reading',
        'previous',
        'rate',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function getTotalAttribute()
    {
        return ($this->reading - $this->previous) * $this->rate;
    }

    public function getStatusTextAttribute()
{
    return $this->status == 1 ? 'Paid' : 'Pending';
}

}