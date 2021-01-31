<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    protected $table = 'customers';

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'extract',
        'direction',
        'telephone'
    ];    

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

}
