<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->delete();

        $permissions = [
         
            ['name'=>'home','group'=>'الصفحة الرييسية','title'=>'الصغحة الرئيسية'],

            ['name' => 'course-types-view', 'group' => 'أنواع الدورات', 'title' => 'عرض أنواع الدورات'],
            ['name' => 'course-types-create', 'group' => 'أنواع الدورات', 'title' => 'إضافة أنواع الدورات'],
            ['name' => 'course-types-edit', 'group' => 'أنواع الدورات', 'title' => 'تعديل أنواع الدورات'],
            ['name' => 'course-types-delete', 'group' => 'أنواع الدورات', 'title' => 'حذف أنواع الدورات'],


            ['name' => 'courses-view', 'group' => 'الدورات', 'title' => 'عرض الدورات'],
            ['name' => 'courses-create', 'group' => 'الدورات', 'title' => 'إضافة الدورات'],
            ['name' => 'courses-edit', 'group' => 'الدورات', 'title' => 'تعديل الدورات'],
            ['name' => 'courses-delete', 'group' => 'الدورات', 'title' => 'حذف الدورات'],

            ['name' => 'countries-view', 'group' => 'الدول', 'title' => 'عرض الدول'],
            ['name' => 'countries-create', 'group' => 'الدول', 'title' => 'إضافة وحدات'],
            ['name' => 'countries-edit', 'group' => 'الدول', 'title' => 'تعديل الدول'],
            ['name' => 'countries-delete', 'group' => 'الدول', 'title' => 'حذف الدول'],
            //*** Academic Modules ***//

            ['name' => 'tracks-view', 'group' => 'المسارات', 'title' => 'عرض المسارات'],
            ['name' => 'tracks-create', 'group' => 'المسارات', 'title' => 'إضافة المسارات'],
            ['name' => 'tracks-edit', 'group' => 'المسارات', 'title' => 'تعديل المسارات'],
            ['name' => 'tracks-delete', 'group' => 'المسارات', 'title' => 'حذف المسارات'],

            ['name' => 'payment-types-view', 'group' => 'أنواع الدفع', 'title' => 'عرض أنواع الدفع'],
            ['name' => 'payment-types-create', 'group' => 'أنواع الدفع', 'title' => 'إضافة أنواع الدفع'],
            ['name' => 'payment-types-edit', 'group' => 'أنواع الدفع', 'title' => 'تعديل أنواع الدفع'],
            ['name' => 'payment-types-delete', 'group' => 'أنواع الدفع', 'title' => 'حذف أنواع الدفع'],

            ['name' => 'users-view', 'group' => 'المستخدمين', 'title' => 'عرض المستخدمين'],
            ['name' => 'users-create', 'group' => 'المستخدمين', 'title' => 'إضافة المستخدمين'],
            ['name' => 'users-edit', 'group' => 'المستخدمين', 'title' => 'تعديل المستخدمين'],
            ['name' => 'users-delete', 'group' => 'المستخدمين', 'title' => 'حذف المستخدمين'],

            ['name' => 'roles-view', 'group' => 'المناصب', 'title' => 'عرض المناصب'],
            ['name' => 'roles-create', 'group' => 'المناصب', 'title' => 'إضافة المناصب'],
            ['name' => 'roles-edit', 'group' => 'المناصب', 'title' => 'تعديل المناصب'],
            ['name' => 'roles-delete', 'group' => 'المناصب', 'title' => 'حذف المناصب'],

            ['name' => 'blogs-view', 'group' => 'المدونة', 'title' => 'عرض المدونة'],
            ['name' => 'blogs-create', 'group' => 'المدونة', 'title' => 'إضافة المدونة'],
            ['name' => 'blogs-edit', 'group' => 'المدونة', 'title' => 'تعديل المدونة'],
            ['name' => 'blogs-delete', 'group' => 'المدونة', 'title' => 'حذف المدونة'],

            ['name' => 'certifications-view', 'group' => 'الشهادات', 'title' => 'عرض الشهادات'],
            ['name' => 'certifications-create', 'group' => 'الشهادات', 'title' => 'إضافة الشهادات'],
            ['name' => 'certifications-edit', 'group' => 'الشهادات', 'title' => 'تعديل الشهادات'],
            ['name' => 'certifications-delete', 'group' => 'الشهادات', 'title' => 'حذف الشهادات'],



            ['name' => 'coupons-view', 'group' => 'كوبونات الخصم', 'title' => 'عرض كوبونات الخصم'],
            ['name' => 'coupons-create', 'group' => 'كوبونات الخصم', 'title' => 'إضافة كوبونات الخصم'],
            ['name' => 'coupons-edit', 'group' => 'كوبونات الخصم', 'title' => 'تعديل كوبونات الخصم'],
            ['name' => 'coupons-delete', 'group' => 'كوبونات الخصم', 'title' => 'حذف كوبونات الخصم'],


            
            ['name' => 'CV-view', 'group' => 'قوالب السيرة الذاتية', 'title' => 'عرض قوالب السيرة الذاتية'],
            ['name' => 'CV-create', 'group' => 'قوالب السيرة الذاتية', 'title' => 'إضافة قوالب السيرة الذاتية'],
            ['name' => 'CV-edit', 'group' => 'قوالب السيرة الذاتية', 'title' => 'تعديل قوالب السيرة الذاتية'],
            ['name' => 'CV-delete', 'group' => 'قوالب السيرة الذاتية', 'title' => 'حذف قوالب السيرة الذاتية'],


            ['name' => 'faculities-view', 'group' => 'الكليات', 'title' => 'عرض الكليات'],
            ['name' => 'faculities-create', 'group' => 'الكليات', 'title' => 'إضافة الكليات'],
            ['name' => 'faculities-edit', 'group' => 'الكليات', 'title' => 'تعديل الكليات'],
            ['name' => 'faculities-delete', 'group' => 'الكليات', 'title' => 'حذف الكليات'],


            ['name' => 'subjects-view', 'group' => 'المواد الدراسية', 'title' => 'عرض المواد الدراسية'],
            ['name' => 'subjects-create', 'group' => 'المواد الدراسية', 'title' => 'إضافة المواد الدراسية'],
            ['name' => 'subjects-edit', 'group' => 'المواد الدراسية', 'title' => 'تعديل المواد الدراسية'],
            ['name' => 'subjects-delete', 'group' => 'المواد الدراسية', 'title' => 'حذف المواد الدراسية'],


            
            ['name' => 'instructors-view', 'group' => 'المدربين', 'title' => 'عرض المدربين'],
            ['name' => 'instructors-create', 'group' => 'المدربين', 'title' => 'إضافة المدربين'],
            ['name' => 'instructors-edit', 'group' => 'المدربين', 'title' => 'تعديل المدربين'],
            ['name' => 'instructors-delete', 'group' => 'المدربين', 'title' => 'حذف المدربين'],


            ['name' => 'languages-view', 'group' => 'اللغات', 'title' => 'عرض اللغات'],
            ['name' => 'languages-create', 'group' => 'اللغات', 'title' => 'إضافة اللغات'],
            ['name' => 'languages-edit', 'group' => 'اللغات', 'title' => 'تعديل اللغات'],
            ['name' => 'languages-delete', 'group' => 'اللغات', 'title' => 'حذف اللغات'],


            ['name' => 'lectures-view', 'group' => 'المحاضرات', 'title' => 'عرض المحاضرات'],
            ['name' => 'lectures-create', 'group' => 'المحاضرات', 'title' => 'إضافة المحاضرات'],
            ['name' => 'lectures-edit', 'group' => 'المحاضرات', 'title' => 'تعديل المحاضرات'],
            ['name' => 'lectures-delete', 'group' => 'المحاضرات', 'title' => 'حذف المحاضرات'],


            ['name' => 'levels-view', 'group' => 'المراحل الدراسية', 'title' => 'عرض المراحل الدراسية'],
            ['name' => 'levels-create', 'group' => 'المراحل الدراسية', 'title' => 'إضافة المراحل الدراسية'],
            ['name' => 'levels-edit', 'group' => 'المراحل الدراسية', 'title' => 'تعديل المراحل الدراسية'],
            ['name' => 'levels-delete', 'group' => 'المراحل الدراسية', 'title' => 'حذف المراحل الدراسية'],


            ['name' => 'notifications-view', 'group' => 'الإشعارات', 'title' => 'عرض الإشعارات'],
            ['name' => 'notifications-create', 'group' => 'الإشعارات', 'title' => 'إضافة الإشعارات'],
            ['name' => 'notifications-edit', 'group' => 'الإشعارات', 'title' => 'تعديل الإشعارات'],
            ['name' => 'notifications-delete', 'group' => 'الإشعارات', 'title' => 'حذف الإشعارات'],


            ['name' => 'parteners-view', 'group' => 'شركاء النجاح', 'title' => 'عرض شركاء النجاح'],
            ['name' => 'parteners-create', 'group' => 'شركاء النجاح', 'title' => 'إضافة شركاء النجاح'],
            ['name' => 'parteners-edit', 'group' => 'شركاء النجاح', 'title' => 'تعديل شركاء النجاح'],
            ['name' => 'parteners-delete', 'group' => 'شركاء النجاح', 'title' => 'حذف شركاء النجاح'],


            ['name' => 'policies-view', 'group' => 'السياسات', 'title' => 'عرض السياسات'],
            ['name' => 'policies-create', 'group' => 'السياسات', 'title' => 'إضافة السياسات'],
            ['name' => 'policies-edit', 'group' => 'السياسات', 'title' => 'تعديل السياسات'],
            ['name' => 'policies-delete', 'group' => 'السياسات', 'title' => 'حذف السياسات'],


            ['name' => 'students-view', 'group' => 'الطلاب', 'title' => 'عرض الطلاب'],
            ['name' => 'students-create', 'group' => 'الطلاب', 'title' => 'إضافة الطلاب'],
            ['name' => 'students-edit', 'group' => 'الطلاب', 'title' => 'تعديل الطلاب'],
            ['name' => 'students-delete', 'group' => 'الطلاب', 'title' => 'حذف الطلاب'],


            
            

        ];

        DB::table('permissions')->insert($permissions);
    }
}
