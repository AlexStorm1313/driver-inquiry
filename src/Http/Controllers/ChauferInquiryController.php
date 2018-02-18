<?php

namespace Alexstorm13\ChauferInquiry\Http\Controllers;

use Alexstorm13\ChauferInquiry\ChauferInquiry;
use Alexstorm13\ChauferInquiry\ChauferLocation;
use Alexstorm13\ChauferInquiry\Mail\NewChauferInquiry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ChauferInquiryController extends Controller
{

    public function get()
    {
        $inquiries = ChauferInquiry::with('locations')->get();
        return response()->json($inquiries);
    }

    public function create(Request $request)
    {
        $inquiryValidator = ChauferInquiry::validate($request->inquiry);
        $locations = $request->inquiry['locations'];
        if ($inquiryValidator->fails()) {
            return response()->json($inquiryValidator->errors());
        } else {
            foreach ($locations as $location) {
                $locationValidator = ChauferLocation::validate($location);
                if ($locationValidator->fails()) {
                    return response()->json($locationValidator->errors());
                }
            }
            $inquiry = ChauferInquiry::create($request->inquiry);
            $inquiry->locations()->createMany($request->inquiry['locations']);
            $inquiry = ChauferInquiry::with('locations')->findOrFail($inquiry->id);
            Mail::to(env("MAIL_TO_ADDRESS"))->send(new NewChauferInquiry($inquiry));
            return response()->json($inquiry);
        }
    }

    public function delete($id)
    {
        $inquiry = ChauferInquiry::findOrFail($id);
        $inquiry->locations()->delete();
        $inquiry = ChauferInquiry::destroy($id);
        return response()->json($inquiry);
    }
}
