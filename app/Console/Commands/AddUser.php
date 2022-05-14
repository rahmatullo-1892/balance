<?php

namespace App\Console\Commands;

use App\Models\Balance;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            $validate = $this->validate(["name" => $name, "login" => $login, "password" => $password]);
            if (!$validate->fails()) {
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
                $this->printErrors($validate->errors()->messages());
            }
        }

        return 0;
    }

    private function validate($data)
    {
        return Validator::make($data, [
                "name"      => "required|min:3|unique:users",
                "login"     => "required|min:3",
                "password"  => "required|min:3",
            ]
//                , [
//                "name.required"  => "ФИО не меньше 3 символов",
//                "name.min"       => "ФИО не меньше 3 символов",
//                "name.unique"    => "Пользователь  с таким логином уже создан",
//                "title.required"  => "Логин не меньше 3 символов",
//                "title.min"       => "Логин не меньше 3 символов",
//                "password.required"  => "Пароль не меньше 3 символов",
//                "password.min"       => "Пароль не меньше 3 символов",
//            ]
        );
    }

    private function printErrors($messages)
    {
        foreach ($messages as $row) {
            $this->warn($row[0]);
            $this->newLine();
        }
    }
}
