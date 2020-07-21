<?php

use Illuminate\Database\Seeder;
use App\Models\DocumentCategory;

class DocumentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocumentCategory::create(['name' => 'Учетная карточка контрагента ЮЛ/ИП']);
        DocumentCategory::create(['name' => 'Анкета ЮЛ/ИП']);
        DocumentCategory::create(['name' => 'Скан-копия свидетельства ОГРН/ОГРНИП ЮЛ (если регистрация прошла до 01.01.2017г.) / ИП']);
        DocumentCategory::create(['name' => 'Скан-копия свидетельства ИНН ЮЛ/ИП']);
        DocumentCategory::create(['name' => 'Скан-копия уведомления о поставке на спец. учет (со всеми изменениями) ЮЛ/ИП']);
        DocumentCategory::create(['name' => 'Скан-копия карты спец. учета ЮЛ/ИП']);
        DocumentCategory::create(['name' => 'Скан-копия уведомления статистики ЮЛ/ИП']);
        DocumentCategory::create(['name' => 'Скан-копия решения или протокола о создании ЮЛ ЮЛ']);
        DocumentCategory::create(['name' => 'Скан-копия решения или протокола о назначении ген. директора ЮЛ']);
        DocumentCategory::create(['name' => 'Скан-копия приказа о назначении ген. директора ЮЛ']);
        DocumentCategory::create(['name' => 'Скан-копия паспорта ген. Директора ЮЛ/ ИП ЮЛ/ИП']);
        DocumentCategory::create(['name' => 'Скан-копия Устава ЮЛ ЮЛ']);
    }
}
