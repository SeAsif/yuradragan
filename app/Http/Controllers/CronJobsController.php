<?php

namespace App\Http\Controllers;
use App\User;
use App\Todo;
use Illuminate\Http\Request;
use App\Mail\SendEmail;
class CronJobsController extends Controller
{
    //

    /** Send email */
    public function sendEmailHourly(){

        try {
            $today = \Carbon\Carbon::today()->format("Y-m-d");

            $User = User::all();
            $data = $User->todos();

            $data->where("created_date", $today)->where(
                "statu", "Active")
                ->get();

            foreach($data as $key=>$value){

                $information = ["title" => "todo created",
                    "message" => $value->title,
                    "username" => $value->name
                ];
                
                \Mail::to(auth::user()->email)->send(new SendEmail($information));

            }
            
            return $this->info('Email Sent Successfully');
        }
        catch (Exception $ex) {
            return $this->info($ex->getMessage());
        }

        
        
    }
}
