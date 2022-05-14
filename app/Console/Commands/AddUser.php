<?php

namespace App\Console\Commands;

use App\Models\Balance;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:add-user {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Добавление пользователя через консоль';

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
        $count = $this->argument('count');
        for ($i = 1; $i <= $count; $i++) {
            $name = $this->ask('ФИО нового пользователя:');
            $login = $this->ask('Логин нового пользователя:');
            $password = $this->secret('Пароль нового пользователя:');
            $check = User::firstWhere("login", $login);
            if (!$check) {
                $user = User::create([
                    "name"      => $name,
                    "login"     => $login,
                    "password"  => Hash::make($password)
                ]);
                Balance::create([
                    "user_id"   => $user->id,
                    "sum"       => 0
                ]);
                $this->info("Пользователь успешно создан");
            } else {
                $this->warn("Пользователь  с таким логином уже создан");
            }

        }

        return 0;
    }
}
