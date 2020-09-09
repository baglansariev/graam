<?php

namespace App;

use App\Http\Controllers\Helpers\ClientHelper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use ClientHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'manager_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function details()
    {
        return $this->hasOne('App\Models\UserDetail', 'user_id');
    }

    public function detailsFromCrm()
    {
        $data = $this->getResponseFromClientTest('GET', '/contractor/show/' . $this->crm_id);

        return json_decode($data);
    }

    public function documents()
    {
        return $this->hasMany('App\Models\UserDocument', 'user_id');
    }
}
