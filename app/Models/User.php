<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public static function CheckPermission($_value){
        if (is_array($_value))
        {

                $permission = \Auth::user()->hasAnyPermission($_value);
                if(!$permission){
                    abort(403);
                    return false;
                }else{
                    return true;
                }
        }else{
                try {
                    return \Auth::user()->hasPermissionTo($_value);
                } catch (\Exception $e){
                    return false;
                }
        }
    }

    public static function CheckUserForProject(Project $project){
        $ProjectEmployee = ProjectEmployee::where(['user_id'=>\Auth::id(),'project_id'=>$project->id])->get();
        if ($ProjectEmployee->isEmpty()){
            abort('403');
        }
    }

}
