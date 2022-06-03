<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = array(
            array('id' => '1','name' => '{"en":"Cairo","ar":"القاهرة"}','status' => '0','code' => '01','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '2','name' => '{"en":"Giza","ar":"الجيزة"}','status' => '0','code' => '21','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '3','name' => '{"en":"Alexandria","ar":"الأسكندرية"}','status' => '0','code' => '02','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '4','name' => '{"en":"Beheira","ar":"البحيرة"}','status' => '0','code' => '18','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '5','name' => '{"en":"Matrouh","ar":"مطروح"}','status' => '0','code' => '33','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '6','name' => '{"en":"Ismailia","ar":"الإسماعلية"}','status' => '0','code' => '19','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '7','name' => '{"en":"Dakahlia","ar":"الدقهلية"}','status' => '0','code' => '12','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '8','name' => '{"en":"Gharbiya","ar":"الغربية"}','status' => '0','code' => '16','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '9','name' => '{"en":"Menofia","ar":"المنوفية"}','status' => '0','code' => '17','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '10','name' => '{"en":"Qaliubiya","ar":"القليوبية"}','status' => '0','code' => '14','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '11','name' => '{"en":"Sharkia","ar":"الشرقية"}','status' => '0','code' => '13','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '12','name' => '{"en":"Kafr Al sheikh","ar":"كفر الشيخ"}','status' => '0','code' => '15','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '13','name' => '{"en":"Red Sea","ar":"البحر الأحمر"}','status' => '0','code' => '31','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '14','name' => '{"en":"Suez","ar":"السويس"}','status' => '0','code' => '04','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '15','name' => '{"en":"Port Said","ar":"بورسعيد"}','status' => '0','code' => '03','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '16','name' => '{"en":"Damietta","ar":"دمياط"}','status' => '0','code' => '11','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '17','name' => '{"en":"South Sinai","ar":"جنوب سيناء"}','status' => '0','code' => '35','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '18','name' => '{"en":"North Sinai","ar":"شمال سيناء"}','status' => '0','code' => '34','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '19','name' => '{"en":"Fayoum","ar":"الفيوم"}','status' => '0','code' => '23','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '20','name' => '{"en":"Beni Suef","ar":"بني سويف"}','status' => '0','code' => '22','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '21','name' => '{"en":"Minya","ar":"المنيا"}','status' => '0','code' => '24','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '22','name' => '{"en":"Assiut","ar":"اسيوط"}','status' => '0','code' => '25','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '23','name' => '{"en":"New Valley","ar":"الوادي الجديد"}','status' => '0','code' => '32','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '24','name' => '{"en":"Sohag","ar":"سوهاج"}','status' => '0','code' => '26','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '25','name' => '{"en":"Qena","ar":"قنا"}','status' => '0','code' => '27','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '26','name' => '{"en":"Luxor","ar":"الأقصر"}','status' => '0','code' => '29','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s')),
            array('id' => '27','name' => '{"en":"Aswan","ar":"اسوان"}','status' => '0','code' => '28','created_at' => date('Y:m:d H:i:s'),'updated_at' => date('Y:m:d H:i:s'))
          );
          City::insert($cities);
    }
}
