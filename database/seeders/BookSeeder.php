<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
              'title'=>"Giao an",
              'author'=>"Mr.Dinh",
              'numberpage'=>300,
               'category_id'=>1,
              'public_date'=>'2010/01/01',
               'price'=>10000000,
              'image'=>'book-image/book3.jpg',
               'description'=>'Sach hay',
            ],
            [
                'title'=>"Tu truyen",
                'author'=>"Ngoc Huy",
                'numberpage'=>300,
                 'category_id'=>1,
                'public_date'=>'2021/01/01',
                 'price'=>10000000,
                'image'=>'book-image/book3.jpg',
                 'description'=>'Sach hay',
              ],
        ]);
    }
}
