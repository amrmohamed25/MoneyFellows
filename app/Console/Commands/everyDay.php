<?php

namespace App\Console\Commands;

use App\Models\Current;
use App\Models\User;
use App\Notifications\NotifyUser;
use Carbon\Carbon;
use Illuminate\Console\Command;

class everyDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'day:pay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currents = Current::all();
        foreach ($currents as $current) {
            if ($current->due_date != null && $current->months != 0) {
                $dueDate = Carbon::parse($current->due_date);
                $temp = Carbon::parse($current->due_date)->subDays(2);
                if (Carbon::now()->greaterThan($dueDate)) {
                    $paidUser = $current->users()->where('current_id', $current->id)->where('months_left_to_be_paid', 1)->first();
                    $admin = User::where('email', 'admin@admin.com')->first();
                    $money = 0;
                    $fees = 0;
                    $current->due_date = Carbon::now()->addMonth()->addDay()->format('Y-m-d');
                    $data = [
                        'body' => 'You received a new notification',
                        'text' => 'Category #' . $current->id . ': ' . $current->name . ' is updated with and new due date is ' . $current->due_date,
                        'url' => url('/gam3yatk'),
                        'thankyou' => 'Thank you'
                    ];
                    foreach ($current->users as $user) {
                        $months = $user->pivot->months_left_to_be_paid;
                        $user->pivot->months_left_to_be_paid = $months - 1;
                        if ($months == 1) {
                            $user->pivot->months_left_to_be_paid = $current->no_of_members;
                        }
                        if ($user->pivot->is_paid == 0) {//Punishment
                            $money += $user->pivot->money;
                            $fees += $user->pivot->money;
                            $user->applyBalance(-$user->pivot->money * 2 * 100, 'Punishment');
                        }
                        $user->pivot->money = $current->money;
                        $user->pivot->is_paid = 0;
                        $user->notify(new NotifyUser($data));
                        $user->pivot->save();
                    }
                    $money = $current->money * $current->no_of_members;
                    $paidUser->applyBalance($money * 100, 'Increase');
                    $admin->applyBalance($fees * 100, 'Increase');
                    $current->months--;
                    $current->save();
                } else if (Carbon::now()->greaterThan($temp)) {//if now is greater than temp (two days before due date)
                    $data = [
                        'body' => 'You received a new notification',
                        'text' => 'You have a day left to pay or you will be charged extra fees=your category money',
                        'url' => url('/gam3yatk'),
                        'thankyou' => 'Thank you'
                    ];
                    foreach ($current->users as $user) {
                        if ($user->pivot->is_paid == 0) {
                            $user->notify(new NotifyUser($data));
                        }
                    }
                }
            }
        }
    }
}
