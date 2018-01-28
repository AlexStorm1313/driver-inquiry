<?php

namespace Alexstorm13\ChauferInquiry\Http\Controllers;

use Alexstorm13\ChauferInquiry\ChauferInquiry;
use Alexstorm13\ChauferInquiry\ChauferLocation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChauferInquiryController extends Controller
{

    public function getChauferInquiries()
    {

    }

    public function create(Request $request)
    {
        $inquiryValidator = ChauferInquiry::validate($request->inquiry);
        if ($inquiryValidator->fails()) {
            return response()->json($inquiryValidator->errors());
        } else {
            $inquiry = ChauferInquiry::create($request->inquiry);
            return response()->json($inquiry);
        }

    }
}
