<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    protected $table='test';
    //开启白名单
    protected $fillable=['name'];
}