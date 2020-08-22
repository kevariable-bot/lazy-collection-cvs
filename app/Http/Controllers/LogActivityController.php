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
            $cvs = fopen('php://output', 'w+');

            fputcsv($cvs, ['Time', 'User ID', 'Message', 'IP Address', 'User Agent']);

            foreach ($logs as $log) {
                fputcsv($cvs, [
                    $log->time,
                    $log->user_id,
                    $log->message,
                    $log->ip_address,
                    $log->user_agent
                ]);
            }

            fclose($cvs);
        }, $filename, ['Content-type' => 'text/cvs']);
    }
}
