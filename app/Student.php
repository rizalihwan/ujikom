<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getGenderStatusAttribute(){
        return $this->jk == 1 ? 'Laki - Laki' : 'Perempuan';
    }
}
