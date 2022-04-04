<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function getRouteKeyName()
    {
        return 'url';
    }
    public function projects($value='') //$category->projects return all projects of that category
    {
        return $this->hasMany(Project::class);
    }

}
