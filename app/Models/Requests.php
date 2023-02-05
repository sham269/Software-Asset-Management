<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    //Table 
    protected $table = 'software_request';
    //Primary Key
    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;
    protected $fillable = ['name','category'];

    public function setCategoryAttribute($value)
    {
        $this->attributes['cost'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['cost'] = json_decode($value);
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
