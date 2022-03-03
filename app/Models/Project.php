<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{


    //YOU WILL NOT REQUIRE THIS FILLABLE / GUARDED LISTS IF YOU VALIDATE ON THE CREATE MODEL
    //+++++++++++++++++++++++//

    //List of fields which will be inserted on this table when an insert is commited
    protected $fillable = ['title', 'url', 'description'];

    //List of fields which will NOT be inserted on this table when an insert is commited
    //protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getRouteKeyName()
    {
        return 'url';
    }
    use HasFactory;
    protected  $table = 'projects';
}