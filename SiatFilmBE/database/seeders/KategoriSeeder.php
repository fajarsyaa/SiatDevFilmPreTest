<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            ['nama_kategori' => 'Action'],
            ['nama_kategori' => 'Comedy'],
            ['nama_kategori' => 'Drama'],
            ['nama_kategori' => 'Horror'],
            ['nama_kategori' => 'Science Fiction'],
            ['nama_kategori' => 'Romance'],
            ['nama_kategori' => 'Fantasy'],
            ['nama_kategori' => 'Thriller'],
            ['nama_kategori' => 'Adventure'],
            ['nama_kategori' => 'Mystery'],
            ['nama_kategori' => 'Animation'],
            ['nama_kategori' => 'Documentary'],
            ['nama_kategori' => 'Family'],
            ['nama_kategori' => 'Musical'],
            ['nama_kategori' => 'War'],
            ['nama_kategori' => 'Western'],
            ['nama_kategori' => 'Biography'],
            ['nama_kategori' => 'Crime'],
            ['nama_kategori' => 'Historical'],
            ['nama_kategori' => 'Sports'],
        ];
        
        
        DB::table('kategori')->insert($kategori);
    }
}
