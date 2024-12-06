<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    protected $fillable = ['registration_no','type','capacity','payload'];
    protected $table = 'airplane';
    public $timestamps = false;
}
