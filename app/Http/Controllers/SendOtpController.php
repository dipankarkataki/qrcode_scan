<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;

class SendOtpController extends Controller
{   

    public function getSendOtp(){
        return view('send-otp');
    }



    public function sendOtp(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'city' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['message' => 'Oops! Validation Failed. '.$validator->errors()->first(), 'status' => 0]);
        }else{
            try{
                $sid = env("TWILIO_ACCOUNT_SID");
                $token = env("TWILIO_AUTH_TOKEN");
                $twilio = new Client($sid, $token);

                $check_phone_exist = User::where('phone', $request->phone)->exists();

                if($check_phone_exist){
                    return response()->json(['message' => 'Oops! Phone Number Associated with another user.', 'status' => 0]);
                }else{
                    $otp = rand(100000, 999999);
                    Cache::put('otp', $otp, now()->addMinutes(5));
                
                    $message = $twilio->messages->create(
                                        "whatsapp:+91".$request->phone, // to
                                        [
                                            "from" => "whatsapp:+14155238886",
                                            "body" => "Hello! ".$otp." is your One Time Password to verify your phone number.",
                                            // "statusCallback" => "http://127.0.0.1:8000"
                                        ]
                                );
                    return response()->json(['message' => 'OTP sent successfully', 'data' => $message->sid , 'status' => 1]);
                }

                
            }catch(\Exception $e){
                return response()->json(['message' => 'Something went Wrong.', 'data' => $e->getMessage() , 'status' => 0]);
            }
            
        }
        
    }


    public function verifyOtp(Request $request){
        $validator = Validator::make($request->all(),[
            'otp' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Oops! Validation Failed. '.$validator->errors()->first(), 'status' => 0]);
        }else{
            if(Cache::get('otp') != $request->otp){
                return response()->json(['message' => 'Whoops! Verification Failed. Incorrect OTP', 'status' => 0 ]);
            }else{
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'city' => $request->city
                ]);

                Cache::forget('otp');
                return response()->json(['message' => 'OTP verified successfully.', 'status' => 1 ]);
            }
        }
    }
}
