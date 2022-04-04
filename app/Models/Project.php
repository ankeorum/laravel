<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{

    use SoftDeletes; //deleted_at on table Proje
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}