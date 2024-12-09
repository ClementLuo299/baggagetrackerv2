<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerInfo
 *
 * @property $user
 * @property $passport_no
 * @property $country_citizenship
 *
 * @property User $user
 * @property Baggage[] $baggage
 * @property Itinerary[] $itineraries
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CustomerInfo extends Model
{
    
    protected $perPage = 20;
    protected $table = 'customer_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user', 'passport_no', 'country_citizenship'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function baggage()
    {
        return $this->hasMany(\App\Models\Baggage::class, 'passport_no', 'passport_no');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itineraries()
    {
        return $this->hasMany(\App\Models\Itinerary::class, 'passport_no', 'passport_no');
    }
    
}
