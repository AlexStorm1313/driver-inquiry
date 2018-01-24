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
        'name', 'email', 'phone', 'start_point', 'end_point'
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
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'start_point' => 'required|string|max:255',
            'end_point' => 'required|string|max:255'
        ]);
        return $validator;
    }

    public function locations()
    {
        return $this->hasMany('Alexstorm13\ChauferInquiry\ChauferInquiryLocation');
    }
}
