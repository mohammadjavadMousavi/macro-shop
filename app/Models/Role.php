<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    
    public static function findByTitle($title)
    {
        return self::query()->whereTitle($title)->firstOrFail();
    }


    public function hasPermission(Permission $permission)
    {
        return $this->permissions()->where('permission_id',$permission->id)->exists();
    }

    
    public function hasPermissions($permission){
        $permissions=Permission::query()->where('title',$permission)->firstOrfail();

        return $this->permissions()->where('id',$permissions->id)->exists();
    }

}
