<?php

use Illuminate\Database\Seeder;

class SidMappingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sid__mappings')->insert([
        	'sid' => '2404000',
        	'technique_name' => 'SQL injection',
        	'threat_name' => 'Trojan activity',
        	'threat_class' => 'Malware',
        	'severity' => 'Major',
            'state' => '0',
        ]);

        DB::table('sid__mappings')->insert([
        	'sid' => '2404001',
        	'technique_name' => 'SQL injection',
        	'threat_name' => 'Trojan activity',
        	'threat_class' => 'Malware',
        	'severity' => 'Major',
            'state' => '0',
        ]);

        DB::table('sid__mappings')->insert([
        	'sid' => '2404002',
        	'technique_name' => 'SQL injection',
        	'threat_name' => 'Trojan activity',
        	'threat_class' => 'Malware',
        	'severity' => 'Major',
            'state' => '0',
        ]);

        DB::table('sid__mappings')->insert([
        	'sid' => '2404003',
        	'technique_name' => 'SQL injection',
        	'threat_name' => 'Trojan activity',
        	'threat_class' => 'Malware',
        	'severity' => 'Major',
            'state' => '0',
        ]);
    }
}
