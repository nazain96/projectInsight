<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pending__events')->insert([
            'sid' => '2404000',
            'hits' => '1',
            'lastseen_at' => '2020_11_22',
            'signature' => 'ET CNC Shadowserver Reported CnC Server IP group 1',
            'status' => 'false',
        ]);

        DB::table('pending__events')->insert([
            'sid' => '2404001',
            'hits' => '2',
            'lastseen_at' => '2020_11_22',
            'signature' => 'ET CNC Shadowserver Reported CnC Server IP group 2',
            'status' => 'false',
        ]);

        DB::table('pending__events')->insert([
            'sid' => '2404002',
            'hits' => '4',
            'lastseen_at' => '2020_11_21',
            'signature' => 'ET CNC Shadowserver Reported CnC Server IP group 3',
            'status' => 'false',
        ]);

        DB::table('pending__events')->insert([
            'sid' => '2404003',
            'hits' => '3',
            'lastseen_at' => '2020_11_22',
            'signature' => 'ET CNC Shadowserver Reported CnC Server IP group 4',
            'status' => 'false',
        ]);

        DB::table('pending__events')->insert([
            'sid' => '2404004',
            'hits' => '2',
            'lastseen_at' => '2020_11_22',
            'signature' => 'ET CNC Shadowserver Reported CnC Server IP group 5',
            'status' => 'false',
        ]);

        DB::table('pending__events')->insert([
            'sid' => '2404005',
            'hits' => '5',
            'lastseen_at' => '2020_11_23',
            'signature' => 'ET CNC Shadowserver Reported CnC Server IP group 6',
            'status' => 'false',
        ]);

        DB::table('pending__events')->insert([
            'sid' => '2404006',
            'hits' => '1',
            'lastseen_at' => '2020_11_21',
            'signature' => 'ET CNC Shadowserver Reported CnC Server IP group 7',
            'status' => 'false',
        ]);

        DB::table('pending__events')->insert([
            'sid' => '2404007',
            'hits' => '2',
            'lastseen_at' => '2020_11_25',
            'signature' => 'ET CNC Shadowserver Reported CnC Server IP group 8',
            'status' => 'false',
        ]);

        DB::table('pending__events')->insert([
            'sid' => '2404008',
            'hits' => '1',
            'lastseen_at' => '2020_11_27',
            'signature' => 'ET CNC Shadowserver Reported CnC Server IP group 9',
            'status' => 'false',
        ]);

        DB::table('pending__events')->insert([
            'sid' => '2404009',
            'hits' => '3',
            'lastseen_at' => '2020_11_22',
            'signature' => 'ET CNC Shadowserver Reported CnC Server IP group 10',
            'status' => 'false',
        ]);

        DB::table('pending__events')->insert([
            'sid' => '2404010',
            'hits' => '2',
            'lastseen_at' => '2020_11_22',
            'signature' => 'ET CNC Shadowserver Reported CnC Server IP group 11',
            'status' => 'false',
        ]);

        DB::table('pending__events')->insert([
            'sid' => '2404011',
            'hits' => '1',
            'lastseen_at' => '2020_11_20',
            'signature' => 'ET CNC Shadowserver Reported CnC Server IP group 12',
            'status' => 'false',
        ]);

        DB::table('pending__events')->insert([
            'sid' => '2404012',
            'hits' => '4',
            'lastseen_at' => '2020_11_22',
            'signature' => 'ET CNC Shadowserver Reported CnC Server IP group 13',
            'status' => 'false',
        ]);

       

    }
}

