<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;

use App\Notifications\MissedDay;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'settings'
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
     * Define attributes to serialize or
     * deserialize in the database.
     */
    protected $casts = [
        'settings' => 'json'
    ];

    public function friendshipRequesters()
    {
        return $this->belongsToMany(User::class, 'friendships', 'friended_id', 'friender_id')
                    ->wherePivot('status', 'pending');
    }

    public function friendedUsers()
    {
        return $this->belongsToMany(User::class, 'friendships', 'friender_id', 'friended_id')
                    ->wherePivot('status', 'pending');
    }

    /**
    * Send the password reset notification.
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }


    public function settingsManager()
    {
        return new SettingsManager($this);
    }

    public function days()
    {
        return $this->hasMany(Day::class)->orderBy('date');
    }

    public function addDay($date, $weight = null)
    {
        if ($date instanceof Day) {
            $date = $date->date;
        }
        
        $userDates = $this->days()->pluck('date')->all();
        
        foreach ($userDates as $userDate)
        {
            if ($userDate == $date) {
                return false;
            }
        }

        return Day::create([
            'user_id' => $this->id,
            'date' => $date,
            'weight' => $weight
        ]);
    }

    public function checkActivityFor($date)
    {
        if ($this->days()->where(['date' => $date])->count() == 0) {
            $n = new MissedDay($date, $this);

            $this->notify($n);

            return $n;
        } else {
            return "You were active on " . $date;
        }
    }
}
