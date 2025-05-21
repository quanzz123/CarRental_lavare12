<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TblOrderstatus;

class OrderStatusSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            [
                'StatusID' => 1,
                'StatusDescription' => 'Đã Thanh Toán'
            ],
            [
                'StatusID' => 2,
                'StatusDescription' => 'Huỷ đơn'
            ],
            [
                'StatusID' => 3,
                'StatusDescription' => 'Đang Thuê'
            ],
            [
                'StatusID' => 4,
                'StatusDescription' => 'Đã Trả'
            ]
        ];

        foreach ($statuses as $status) {
            TblOrderstatus::updateOrCreate(
                ['StatusID' => $status['StatusID']],
                ['StatusDescription' => $status['StatusDescription']]
            );
        }
    }
}
