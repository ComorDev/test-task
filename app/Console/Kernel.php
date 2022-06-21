<?php

namespace App\Console;

use App\Http\Client\Curl;
use App\Models\CheckedUrl;
use App\Models\CheckUrl;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(
            function () {
                foreach (CheckUrl::where('quantity', '>', '0')->get() as $checkUrl) {
                    $code = Curl::send($checkUrl->url);
                    if (!CheckedUrl::where('url', $checkUrl->url)->exists()) {
                        CheckedUrl::create([
                            'url' => $checkUrl->url,
                            'code' => $code,
                            'quantity' => 1
                        ]);
                        echo $code;
                    } else {
                        $checked = CheckedUrl::where('url', $checkUrl->url)->first();
                        $checked->code = $code;
                        $checked->quantity = $checked->quantity++;
                        $checked->save();
                        echo $code . " " . $checked->quantity;
                    }
                }
            }
        )->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
