<?php

namespace App\Http\Controllers;

use App\Notifications\TestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification as Notification;

class SecretAdminFunction extends Controller
{

    protected $guard = 'web';
    public function migrate_fresh(){
        try {
            //code...
            Artisan::call('migrate:fresh --seed');
        } catch (\Throwable $th) {
           Log::error($th,['migrate']);
           dd('Error');
        }
        return "Migrated succesfully";

    }

    public function storage_link(){
        try {
            //code...
            Artisan::call('storage:link');
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th,['migrate']);
           dd('Error', $th);
        }
        return "Storage link generated";

    }
    
    public function queue($task){
        try {
            Artisan::call('queue:'.$task);
        } catch (\Throwable $th) {
            Log::error($th,['queue']);
            dd('Error', $th);
        }
        return "Queue: ".$task." OK";
    }

    public function notify(Request $request){
        try {
            //code...
            Notification::route('mail', $email)->notify(new TestNotification());
        } catch (\Throwable $th) {
            Log::error($th,['notif']);
            dd('Error', $th);
        }
        return "Notification sent";
    }

    public function clear_cache($task = 'cache'){
        try {
            Artisan::call($task.':clear');
        } catch (\Throwable $th) {
           Log::error($th,['cache']);
            dd('Error', $th);
        }
        return "$task cleared";
    }
}
