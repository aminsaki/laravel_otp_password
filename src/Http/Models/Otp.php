<?php

namespace UserAuth\laravelMobileAuth\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;

    protected $fillable = ['phone', 'code' ,'created_at'];

    protected $casts = [
        'created_at' => 'timestamp'
    ];

    /**
     * @param $query
     * @param $phone
     * @return mixed
     */
    public function ScopePhone($query, $phone)
    {
        return $query->where(['phone' => $phone])->first();
    }
}
