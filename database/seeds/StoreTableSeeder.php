<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('herbal_medicine_stores')->truncate();

        $store = new \VMN\Auth\HerbalMedicineStore();
        $store->setAttribute('accountName', 'thoxuanduong');
        $store->setAttribute('email', 'dongy@thoxuanduong.com');
        $store->setAttribute('storename', 'NHÀ THUỐC ĐÔNG Y GIA TRUYỀN THỌ XUÂN ĐƯỜNG');
        $store->setAttribute('address','99 phố Vồi, Huyện Thường Tín, Thành Phố Hà Nội, Việt Nam');
        $store->setAttribute('phonenumber', '04 3385 3321');
        $store->setAttribute('representative', 'Lương y Phùng Tuấn Giang');
        $store->setAttribute('avatar', 'assets/img/default/avatar.jpg');

        $store->save();

        $store1 = new \VMN\Auth\HerbalMedicineStore();
        $store1->setAttribute('accountName', 'dongyhangcot');
        $store1->setAttribute('email', 'boymanu93@gmail.com');
        $store1->setAttribute('storename', 'Nhà Thuốc Đông Y Gia Truyền 15 Hàng Cót - Hà Nội');
        $store1->setAttribute('address','15 Hàng Cót, Hoàn Kiếm, Thành Phố Hà Nội, Việt Nam');
        $store1->setAttribute('phonenumber', '04 8281932');
        $store1->setAttribute('representative', 'Lương y Nguyễn Huy Tiến');
        $store1->setAttribute('avatar', 'assets/img/default/avatar.jpg');

        $store1->save();


    }
}
