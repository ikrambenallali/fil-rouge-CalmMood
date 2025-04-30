<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Positivity;
use App\Notifications\ExerciceNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendPositivityNotificationsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            $positivities = Positivity::where('user_id', $user->id)->get();

            if ($positivities->isNotEmpty()) {
                $user->notify(new ExerciceNotification($positivities));
            }
        }
    }
}
