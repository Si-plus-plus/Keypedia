<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addHeaderTransactionToSpecificUser(
            2, date("Y-m-d H:i:s", mktime(0, 0, 0, 7, 1, 2022)),
        );
        $this->addHeaderTransactionToSpecificUser(
            2, date("Y-m-d H:i:s", mktime(0, 0, 0, 7, 2, 2022)),
        );
        $this->addHeaderTransactionToSpecificUser(
            2, date("Y-m-d H:i:s", mktime(0, 0, 0, 7, 4, 2022)),
        );
        $this->addHeaderTransactionToSpecificUser(2, NULL);

        $this->addHeaderTransactionToSpecificUser(
            3, date("Y-m-d H:i:s", mktime(0, 0, 0, 8, 2, 2022)),
        );
        $this->addHeaderTransactionToSpecificUser(
            3, date("Y-m-d H:i:s", mktime(0, 0, 0, 8, 4, 2022)),
        );
        $this->addHeaderTransactionToSpecificUser(
            3, date("Y-m-d H:i:s", mktime(0, 0, 0, 8, 8, 2022)),
        );
        $this->addHeaderTransactionToSpecificUser(3, NULL);
    }

    private function addHeaderTransactionToSpecificUser($user_id, $date) {
        $transaction_id = DB::table('header_transactions')->insertGetId([
            'date' => $date,
            'user_id' => $user_id,
        ]);

        $keyboards_count = DB::table('keyboards')->count();

        for ($keyboard_id = 1; $keyboard_id <= $keyboards_count; $keyboard_id++) {
            if (rand(0,1) > 0) {
                $this->addDetailTransactionWithRandomItems($transaction_id, $keyboard_id);
            }
        }
    }

    private function addDetailTransactionWithRandomItems($transaction_id, $keyboard_id) {
        $keyboard = DB::table('keyboards')
            ->where('id', $keyboard_id)
            ->get()[0];

        DB::table('detail_transactions')->insert([
            'qty' => rand(1, 5),

            'transaction_id' => $transaction_id,
            'keyboard_id' => $keyboard_id,
        ]);
    }
}
