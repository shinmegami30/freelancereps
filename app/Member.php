<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['firstname','lastname', 'address1', 'address2', 'city', 'state', 'postalcode', 'code', 'dispatch_date', 'filename'];

    // Table Name
    protected $table = 'members';
    // Primary Key
    public $primaryKey = 'id';

    public $timestamps = true;
}
