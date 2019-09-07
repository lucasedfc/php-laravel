<?php

use Illuminate\Database\Seeder;

class fillNotes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i <= 40; $i++){
            DB::table('notes')->insert(array(
                'title' => 'Mi note '.$i,
                'description' => 'The description note '.$i
            ));
        }

        $this->command->info('Table notes filled correctly');
    }
}
