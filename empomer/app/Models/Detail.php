<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    
    protected $table = 'details';

    protected $fillable = [
        'id',
        'description',
        'price',
        'start_date',
        'end_date',
        'bill_id',
        'gift_id'
    ];    

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }

    public function gift()
    {
        return $this->hasOne(Gift::class);
    }    
}
