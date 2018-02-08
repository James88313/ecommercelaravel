<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// POPULATE TABLE ADMINS WITH DEFAULT ADMIN
        DB::table('admins')->insert([
            'name' => 'Administrator',
            'email' => 'danielpaz92@hotmail.com',
            'password' => bcrypt('p4ssw0rd'),
            'status' => '1',
        ]);

        // POPULATE TABLE TAGS WITH DEFAULT TAGS
        DB::table('tags')->insert(['name' => 'Dual Chip']);
        DB::table('tags')->insert(['name' => 'Android']);
        DB::table('tags')->insert(['name' => 'Smartphone']);
        DB::table('tags')->insert(['name' => 'Octacore']);
        DB::table('tags')->insert(['name' => 'Quadcore']);

        // POPULATE TABLE BRANDS WITH DEFAULT BRANDS
        DB::table('brands')->insert(['name' => 'Samsung', 'image' => 'samsung-1.png']);
        DB::table('brands')->insert(['name' => 'Logo Company', 'image' => 'logo-company-2.png']);
        DB::table('brands')->insert(['name' => 'Motorola', 'image' => 'motorola-3.png']);
        DB::table('brands')->insert(['name' => 'Apple Company', 'image' => 'apple-company-4.png']);
        DB::table('brands')->insert(['name' => 'Acer', 'image' => 'acer-5.png']);

        // POPULATE TABLE CATEGORIES WITH DEFAULT CATEGORIES
        DB::table('categories')->insert(['name' => 'Laptop', 'slug' => 'laptop', 'description' => 'description test', 'image' => 'laptop-1.png']);
        DB::table('categories')->insert(['name' => 'Cellphones', 'slug' => 'cellphones', 'description' => 'Cellphones description', 'image' => 'cellphones-2.png']);
        DB::table('categories')->insert(['name' => 'Gadgets', 'slug' => 'gadgets', 'description' => 'Sample description for gadgets', 'image' => 'gadgets-3.png']);

        // POPULATE TABLE COUPONS WITH DEFAULT COUPONS
        DB::table('coupons')->insert(['name' => 'Birthday', 'code' => 'BIRTH2018', 'discount' => '200']);
        DB::table('coupons')->insert(['name' => 'Wedding', 'code' => 'WEEDING2018', 'discount' => '300']);

        // POPULATE TABLE WITH DEFAULT PRODUCTS
        DB::table('products')->insert([
            'name' => 'Samsung J3',
            'slug' => 'samsung-j3',
            'description' => 'Sample description for Samsung J3',
            'price' => '900',
            'quantity' => '5',
            'category_id' => '2',
            'brand_id' => '1',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '1',
            'image' => 'samsung-j3-1.jpg',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '1',
            'image' => 'samsung-j3-2.jpg',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '1',
            'image' => 'samsung-j3-3.jpg',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '1',
            'image' => 'samsung-j3-4.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'Moto ZPlay',
            'slug' => 'moto-zplay',
            'description' => 'Sample description for Moto Z Play',
            'price' => '1800',
            'quantity' => '5',
            'category_id' => '2',
            'brand_id' => '3',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '2',
            'image' => 'motozplay-1.jpg',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '2',
            'image' => 'motozplay-2.jpg',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '2',
            'image' => 'motozplay-3.jpg',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '2',
            'image' => 'motozplay-4.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Samsung J7',
            'slug' => 'samsung-j7',
            'description' => 'Sample description for Samsung J7',
            'price' => '1900',
            'quantity' => '5',
            'category_id' => '2',
            'brand_id' => '1',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '3',
            'image' => 'samsung-j7-1.jpg',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '3',
            'image' => 'samsung-j7-2.jpg',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '3',
            'image' => 'samsung-j7-3.jpg',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '3',
            'image' => 'samsung-j7-4.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'Iphone 6S',
            'slug' => 'iphone-6s',
            'description' => 'Sample Description for Iphone 6s',
            'price' => '1500',
            'quantity' => '5',
            'category_id' => '2',
            'brand_id' => '4',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '4',
            'image' => 'iphone6s-1.jpg',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '4',
            'image' => 'iphone6s-2.jpg',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '4',
            'image' => 'iphone6s-3.jpg',
        ]);
        DB::table('product_image')->insert([
            'product_id' => '4',
            'image' => 'iphone6s-4.jpg',
        ]);

        // POPULATE PRODUCT WITH TAGS
        DB::table('product_tag')->insert([
            'product_id' => '1',
            'tag_id' => '2',
        ]);
        DB::table('product_tag')->insert([
            'product_id' => '1',
            'tag_id' => '1',
        ]);
        DB::table('product_tag')->insert([
            'product_id' => '2',
            'tag_id' => '2',
        ]);
        DB::table('product_tag')->insert([
            'product_id' => '2',
            'tag_id' => '1',
        ]);
        DB::table('product_tag')->insert([
            'product_id' => '4',
            'tag_id' => '3',
        ]);

        // POPULATE DEFAULT CUSTOMER
        DB::table('users')->insert([
            'name'=>'Test User',
            'email'=>'test@laravelecommerce.com',
            'password' => bcrypt('p4ssw0rd'),
            'cpf'=>'02723180000',
            'birth'=>'1992-03-06',
            'gender'=>0,
            'phone'=>'51999501047',
            'cep'=>'95630000',
            'estate'=>'RS',
            'city'=>'Parobé',
            'address'=>'Rua Osvaldo Gil',
            'newsletter'=>0,
        ]);
    }
}
