<?php

namespace App\Acme\Listeners;

use App\Acme\Emails\VerificationEmail;
use App\Acme\Events\PostCreatedEvent;
use App\Acme\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class PostCreatedListener implements ShouldQueue
{
    use InteractsWithQueue, Queueable;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param PostCreatedEvent $event
     * @return void
     */
    public function handle(PostCreatedEvent $event)
    {
        $devices = User::where('device_id', 'LIKE', 'Expo%')->distinct('device_id')->pluck('device_id')->toArray();

        //API URL
        $output_url = "https://exp.host/--/api/v2/push/send";

        //create a new cURL resource
        $ch = curl_init($output_url);

        //setup request to send json via POST
        $expoData = [];
        foreach ($devices as $device) {
            $expoData[] = [
                "to" => $device,
                "title" => $event->post->post_title,
//                "body" => "New post",
            ];
        }

        //attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($expoData));

        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute the POST request
        $result = curl_exec($ch);

        //close cURL resource
        curl_close($ch);
    }
}

