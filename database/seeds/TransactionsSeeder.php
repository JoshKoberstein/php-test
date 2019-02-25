<?php

use Illuminate\Database\Seeder;

class TransactionsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run() {

        \DB::table('transactors')->insert([
            'first_name' => 'Al',
            'last_name'  => 'Capone',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);

        \DB::table('transactors')->insert([
            'first_name' => 'Bugsy',
            'last_name'  => 'Siegel',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);

        \DB::table('transactors')->insert([
            'first_name' => 'John',
            'last_name'  => 'Dillinger',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);

        $j = 100000;

        for ($i = 0; $i < $j; $i++) {

            \DB::table('transactions')->insert([
                'amount'        => \rand(0, 100),
                'transactor_id' => \rand(1, 3),
                'transacted_at' => new \DateTime()
            ]);

        }

    }

}
