<?php

namespace App;

use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class Admin extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * auth
     * @var string
     */
    protected $guard = 'admin';

    /**
     * permission
     * @var string
     */
    protected $guard_name = 'web_admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','job_title',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
}
