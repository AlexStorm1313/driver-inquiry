<?php

namespace Alexstorm13\ChauferInquiry;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ChauferLocation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chaufer_inquiry_id', 'location', 'index'
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
            'location' => 'required|string|max:255',
            'index' => 'required|integer|max:255',
        ]);
        return $validator;
    }

    public function inquiry()
    {
        return $this->belongsTo('Alexstorm13\ChauferInquiry\ChauferInquiry');
    }
}
