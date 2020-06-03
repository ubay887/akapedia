<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = "about";
    protected $fillable = ['kode', 'content', 'no_tlp', 'instagram', 'facebook'];
}
