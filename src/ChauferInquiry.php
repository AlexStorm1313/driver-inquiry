<?php

namespace Alexstorm13\ChauferInquiry;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ChauferInquiry extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'date_time', 'private_car' 'comments'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'pivot'
    ];

    public static function validate($menu)
    {
        $validator = Validator::make($menu, [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'sometimes|required|string|max:255',
            'date_time' => 'required|date|max:255',
            'private_car' => 'required|boolean|max:1',
            'comments' => 'sometimes|required|string|max:255'
        ]);
        return $validator;
    }

    public function locations()
    {
        return $this->hasMany('Alexstorm13\ChauferInquiry\ChauferLocation');
    }
}
