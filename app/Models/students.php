<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\types ;

class students extends Model
{
    use HasFactory;
    public $timestamps = false;

    function getTypeName(){
        $type = types::where('id',$this->type_id)->first();
        return $type->name;
    }

    protected $fillable =[
        'type_id', 'name' , 'birthday', 'gender' , 'address' , 'phone_number' , 'email'
    ];

}
