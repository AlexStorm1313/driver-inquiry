<?php

namespace Alexstorm13\ChauferInquiry;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ChauferInquiryLocation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'index'
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

        ]);
        return $validator;
    }
}
