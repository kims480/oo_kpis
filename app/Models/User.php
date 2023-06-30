<?php

namespace App\Models;



use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version July 24, 2021, 2:31 am UTC
 *
 * @property string $name
 * @property string $email
 */
class User extends Authenticatable
{
    use SoftDeletes, HasRoles, HasPermissions, HasFactory, Notifiable;


    public $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'expire',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'required|max:255|unique:users,email',
        'password' => 'required'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
        'pivot'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = array('role_data', 'role_text', 'status_online', 'is_online');
    public function isSuperAdmin()
    {
        return $this->hasRole(Role::SUPPER_ADMIN);
    }
    public function stk_office()
    {
        return $this->hasRole(Role::SUPPER_ADMIN);
    }
    public function getRoleDataAttribute()
    {
        return $this->roles->pluck('id', 'name');
    }
    public function getRoleTextAttribute()
    {
        return $this->roles->pluck('name')->implode(',');
    }
    public function getStatusOnlineAttribute()
    {
        return $this->is_online ? "online" : "";
    }
    public function getIsOnlineAttribute()
    {
        $checkTime = $this->freshTimestamp()->copy()->subMinutes(config('fast.time_checkout'));
        return $this->attendances()->where('present', 1)->where('time_out', '>=', $checkTime)->exists();
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function checkIn()
    {
        $now = $this->freshTimestamp();
        $attendances = $this->attendances()
            ->where('day', $now->format('Y-m-d'))
            ->where('present', 1)
            ->first();
        if ($attendances != null && $attendances->time_out > $now->copy()->subMinutes(config('fast.time_checkout'))) {
            $attendances->update([
                'time_out' => $now,
                'present' => 1
            ]);
            return $attendances;
        } else {
            $this->attendances()
                //->where('day', $now->format('Y-m-d'))
                ->where('present', 1)->update([
                    'present' => 0,
                ]);
        }

        return $this->attendances()->create([
            'day' => $now->format('Y-m-d'),
            'time_in' => $now,
            'ip' => request()->ip(),
            'present' => 1
        ]);
    }

    public function checkOut($present = 1)
    {
        $now = $this->freshTimestamp();
        $date = request()->session()->get(config('fast.key_checkin'));
        if ($date == null) {
            $date = $now;
        }
        $attendances = $this->attendances()
            ->where('day', $date->format('Y-m-d'))
            ->where('present', 1)
            ->where('ip', request()->ip())
            //->whereNull('time_out')
            ->first();
        if ($attendances == null) {
            $attendances = $this->checkIn();
        }
        return $attendances->update([
            'time_out' => $now,
            'present' => $present
        ]);
    }

    /**
     * Get all of the snags for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function snags(): HasMany
    {
        return $this->hasMany(Snag::class, 'snag_reported_by', 'id');
    }

    /**
     * Get all of the batteries for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function batteries()
    {
        return $this->hasMany(BatteryAdd::class, 'added_by', 'id');
    }
    /**
     * Get all of the batteries for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offices()
    {
        return $this->belongsToMany(Office::class, 'office_user');
    }

    // $users = DB::table('users')
    //             ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
    //             ->get();

    // $users = DB::table('users')
    //             ->rightJoin('posts', 'users.id', '=', 'posts.user_id')
    //             ->get();
}
