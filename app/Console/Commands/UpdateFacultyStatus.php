<?php

namespace App\Console\Commands;

use App\Models\Faculty;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateFacultyStatus extends Command
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-faculty-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $faculties = Faculty::all();

        foreach ($faculties as $faculty) {
            if ($this->isOneYearCompleted($faculty)) {
                $faculty->is_permanent = true;  // Update the status
                $faculty->save();               // Save the updated model
                $this->info('Faculty ID: ' . $faculty->id . ' updated to permanent.');
            }
        }

        return Command::SUCCESS;
    }

    private function isOneYearCompleted($faculty)
    {
        $year = $faculty->since;
        $createdAt = Carbon::parse($faculty->created_at);
        $month = $createdAt->month;
        $day = $createdAt->day;

        $combinedDate = Carbon::createFromDate($year, $month, $day);
        $oneYearLater = $combinedDate->addYear();

        return Carbon::now()->greaterThanOrEqualTo($oneYearLater);
    }
}
