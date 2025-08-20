<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    protected $table = 'clients';

    protected $fillable = [
        'client_id',
        'firstname',
        'middlename',
        'lastname',
        'contact',
        'address',
        'meter_code',
        'status',
    ];
    public function billings()
    {
        return $this->hasMany(Billing::class);
    }
    

}
