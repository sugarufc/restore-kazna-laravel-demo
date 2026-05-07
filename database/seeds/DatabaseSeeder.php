<?php

use App\Otdel;
use App\User;
use App\Worker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workers')->delete();
        DB::table('ipaddresses')->delete();
        DB::table('specials')->delete();
        DB::table('otdels')->delete();
        DB::table('users')->delete();

        User::create([
            'name' => 'Demo Admin',
            'email' => config('app.demo_admin_email'),
            'password' => Hash::make(config('app.demo_admin_password')),
            'is_admin' => true,
        ]);

        DB::table('specials')->insert([
            ['id' => 1, 'name' => 'Руководитель отдела', 'sort' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Главный специалист-эксперт', 'sort' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Ведущий специалист-эксперт', 'sort' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Старший казначей', 'sort' => 40, 'created_at' => now(), 'updated_at' => now()],
        ]);

        $otdels = [
            ['id' => 1, 'f_name' => 'Отдел информационных систем', 's_name' => 'ОИС', 'parent_id' => 0, 'sort' => 10],
            ['id' => 2, 'f_name' => 'Отдел кассового обслуживания', 's_name' => 'ОКО', 'parent_id' => 0, 'sort' => 20],
            ['id' => 3, 'f_name' => 'Отдел бюджетного учета', 's_name' => 'ОБУ', 'parent_id' => 0, 'sort' => 30],
            ['id' => 4, 'f_name' => 'Отдел доходов', 's_name' => 'ОД', 'parent_id' => 0, 'sort' => 40],
            ['id' => 5, 'f_name' => 'ТОФК по Ленинскому району', 's_name' => 'Ленинский район', 'parent_id' => 1, 'sort' => 110],
            ['id' => 6, 'f_name' => 'ТОФК по Советскому району', 's_name' => 'Советский район', 'parent_id' => 1, 'sort' => 120],
        ];

        foreach ($otdels as $otdel) {
            Otdel::create($otdel);
        }

        $workers = [
            ['name' => 'Кузнецов Андрей Викторович', 'special_id' => 1, 'vts' => 4117, 'gts' => 872255501, 'kab' => 301, 'sort' => 10, 'otdel_id' => 1],
            ['name' => 'Лебедева Ольга Сергеевна', 'special_id' => 2, 'vts' => 4123, 'gts' => 872255502, 'kab' => 302, 'sort' => 20, 'otdel_id' => 1],
            ['name' => 'Соколов Дмитрий Павлович', 'special_id' => 3, 'vts' => 4129, 'gts' => 872255503, 'kab' => 303, 'sort' => 30, 'otdel_id' => 1],
            ['name' => 'Морозова Елена Игоревна', 'special_id' => 1, 'vts' => 4231, 'gts' => 872255511, 'kab' => 212, 'sort' => 10, 'otdel_id' => 2],
            ['name' => 'Волков Артём Николаевич', 'special_id' => 2, 'vts' => 4236, 'gts' => 872255512, 'kab' => 214, 'sort' => 20, 'otdel_id' => 2],
            ['name' => 'Никитина Светлана Олеговна', 'special_id' => 2, 'vts' => 4342, 'gts' => 872255521, 'kab' => 118, 'sort' => 10, 'otdel_id' => 3],
            ['name' => 'Фёдоров Максим Андреевич', 'special_id' => 4, 'vts' => 4458, 'gts' => 872255531, 'kab' => 124, 'sort' => 10, 'otdel_id' => 4],
            ['name' => 'Орлов Илья Константинович', 'special_id' => 3, 'vts' => 4561, 'gts' => 872255541, 'kab' => 12, 'sort' => 10, 'otdel_id' => 5],
            ['name' => 'Белова Наталья Юрьевна', 'special_id' => 3, 'vts' => 4567, 'gts' => 872255542, 'kab' => 15, 'sort' => 20, 'otdel_id' => 6],
        ];

        foreach ($workers as $worker) {
            Worker::create($worker);
        }

        DB::table('ipaddresses')->insert([
            ['ip' => '10.10.1.12', 'title' => 'Основной сервер', 'desc' => 'Внутренний demo-сервер приложений', 'created_at' => now(), 'updated_at' => now()],
            ['ip' => '10.10.1.25', 'title' => 'Сетевой принтер', 'desc' => 'Принтер отдела информационных систем', 'created_at' => now(), 'updated_at' => now()],
            ['ip' => '10.10.2.31', 'title' => 'Рабочая станция', 'desc' => 'Demo-запись для справочника IP', 'created_at' => now(), 'updated_at' => now()],
            ['ip' => '10.10.3.44', 'title' => 'Коммутатор', 'desc' => 'Сетевое оборудование тестового отдела', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
