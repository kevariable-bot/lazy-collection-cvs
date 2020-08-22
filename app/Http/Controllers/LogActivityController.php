<?php

namespace App\Http\Controllers;

use App\LogActivity;

class LogActivityController extends Controller
{
    public function export()
    {
        $logs = LogActivity::orderBy('time')->cursor();
        $filename = 'log-activities.cvs';

        return response()->streamDownload(function () use ($logs) {
            $csv = fopen("php://output", "w+");

            fputcsv($csv, ["Time", "User ID", "Message", "IP Address", "User Agent"]);

            foreach ($logs as $log) {
                fputcsv($csv, [
                    $log->time,
                    $log->user_id,
                    $log->message,
                    $log->ip_address,
                    $log->user_agent
                ]);
            }

            fclose($csv);
        }, $filename, ['Content-type' => 'text/cvs']);
    }
}
