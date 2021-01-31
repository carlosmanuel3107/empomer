<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'bills';

    protected $fillable = [
        'id',
        'date_expedition',
        'customer_id'       
    ];    

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function detail()
    {
        return $this->hasOne(Detail::class);
    }   
    
    public static function generate_id()
    {
        $bill_result = Bill::latest('id')->first();        
        $bill_id=0;       
        if (is_null($bill_result)){
            $bill_id = 1000;
        }else{
            $bill_id = $bill_result->id + 1;
        }
        return $bill_id;
    }

}
