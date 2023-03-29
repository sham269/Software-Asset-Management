<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Table name
    protected $table = 'posts';

    //Primary Key
    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;
    // public function setCategoryAttribute($value)
    // {
    //     $this->attributes['blacklisted'] = json_encode($value);
    // }
    // public function getCategoryAttribute($value)
    // {
    //     return $this->attributes['blacklisted'] = json_decode($value);
    // }
    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
