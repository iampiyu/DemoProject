<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use App\Models\Demo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

$ip_cookie = "ip";
$ip_address = $_SERVER['REMOTE_ADDR'];

// Set a cookie that expires in 30 minutes
Cookie::queue(Cookie::make($ip_cookie, $ip_address, 30));



class DemoController extends Controller
{
    //
    public function index()
    {
        return view('demo', ['message' => " "]);
    }


    public function store(Request $request)
    {
        $start_time = microtime(true);
        $a = 1;

        // Start loop
        for ($i = 1; $i <= 1000; $i++) {
            $a++;
        }

        // End clock time in seconds
        $end_time = microtime(true);

        // Calculate script execution time
        $execution_time = ($end_time - $start_time);
        $executionTime =  $execution_time;

        $saveDemo = new Demo();
        $saveDemo->FirstName = $request->firstName;
        $saveDemo->LirstName = $request->lastName;
        $saveDemo->ExecutionTime = $executionTime . " sec";

        if ($saveDemo->save()) {
            // return view('demo', ['message' => "Data store"]);
            return redirect()->back()->with('message', 'Data store');
        } else {
            return redirect()->back()->with('message', "Data couldn't store");
            // return view('demo', ['message' => "Data couldn't save"]);

        };
    }


    public function sendMail(Request $request)
    {
        $recipent = $request->mail_to;
        $message_text = $request->mail_message;

        //Sent mail in laravel 
        $info = array(
            'message' => $message_text
        );

        Mail::to($recipent)->send(new TestEmail($info));
        // return view('demo', ['message' => "Mail sent Successfully "]);
        return redirect()->back()->with('message', "Mail sent Successfully");

    }
}
