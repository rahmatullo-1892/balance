<?php

namespace App\Console\Commands;

use App\Models\Balance;
use App\Models\History;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChangeBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:change-balance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Опреации с балансом пользователя';

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
        $login = $this->ask('Логин пользователя:');

        $check = Balance::where("user_id", DB::raw("(SELECT id FROM users WHERE login='" . $login . "')"))->first();
        if ($check) {
            $sum = $this->ask('Сумма операции:');
            if ($check->sum + $sum >= 0) {
                $comments = $this->ask('Комментарий:');
                Balance::where("id", $check->id)->update([
                    "sum" => $check->sum + $sum
                ]);
                History::create([
                    "user_id"   => $check->user_id,
                    "sum"       => $sum,
                    "comments"  => $comments
                ]);
                $this->info("Операция успешно проведена");
            } else {
                $this->warn("Баланс не может быть меньше нуля");
            }
        } else {
            $this->warn("Пользователь не найден");
        }


        return 0;
    }
}
