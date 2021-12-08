<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        /** 
         * categories permission
         */

        Permission::query()->insert([
            
            [
                'title' => 'create-category',
                'label' => 'ایجاد دسته بندی'
            ],

        ]);





         /** 
         * products permission
         */

        Permission::query()->insert([
            [
                'title' => 'read-product',
                'label' => 'خواندن  محصول'
            ],
            
            [
                'title' => 'create-product',
                'label' => 'ایجاد  محصول'
            ],
            
            [
                'title' => 'update-product',
                'label' => 'ویرایش  محصول'
            ],

            [
                'title' => 'delete-product',
                'label' => 'حذف  محصول'
            ],

        ]);



         /** 
         * users permission
         */

        Permission::query()->insert([
            [
                'title' => 'read-user',
                'label' => 'خواندن  کاربر'
            ],
            
            [
                'title' => 'create-user',
                'label' => 'ایجاد  کاربر'
            ],
            
            [
                'title' => 'delete-user',
                'label' => 'حذف  کاربر'
            ],

        ]);




         /** 
         * comment permission
         */

        Permission::query()->insert([
            [
                'title' => 'read-comment',
                'label' => 'خواندن  کامنت'
            ],

            [
                'title' => 'delete-comment',
                'label' => 'حذف  کامنت'
            ],

        ]);




        /** 
         * roles permission
         */
        Permission::query()->insert([
            [
                'title' => 'read-role',
                'label' => 'خواندن  نقش'
            ],
            
            [
                'title' => 'create-role',
                'label' => 'ایجاد  نقش'
            ],
            
            [
                'title' => 'update-role',
                'label' => 'ویرایش  نقش'
            ],

            [
                'title' => 'delete-role',
                'label' => 'حذف  نقش'
            ],

        ]);



        /** 
         * dashbord permission
         */
        Permission::query()->insert([
            [
                'title' => 'view-dashbord',
                'label' => 'دسترسی به داشبورد'
            ],

        ]);    
    }
}
