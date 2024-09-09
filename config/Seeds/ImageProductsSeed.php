<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * ImageProducts seed.
 */
class ImageProductsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 151,
                'piority' => 1,
                'path_image' => '/img/Products/Piano1.jpg',
                'start_date' => '2023-01-01 10:00:00',
                'end_date' => '2024-01-01 10:00:00',
                'created_at' => '2023-01-01 10:00:00',
                'created_by' => 'admin',
                'updated_at' => '2024-09-09 18:33:07',
                'updated_by' => 'admin1',
                'delete_flg' => 0,
                'product_id' => 7,
            ],
            [
                'id' => 152,
                'piority' => 2,
                'path_image' => '/img/Products/Piano2.jpg',
                'start_date' => '2023-01-01 10:00:00',
                'end_date' => '2024-01-01 10:00:00',
                'created_at' => '2023-01-02 11:00:00',
                'created_by' => 'admin',
                'updated_at' => '2024-09-09 20:19:08',
                'updated_by' => 'admin1',
                'delete_flg' => 0,
                'product_id' => 10,
            ],
            [
                'id' => 153,
                'piority' => 1,
                'path_image' => '/img/Products/Guitar1.jpg',
                'start_date' => '2023-01-01 10:00:00',
                'end_date' => '2024-01-01 10:00:00',
                'created_at' => '2023-01-03 12:00:00',
                'created_by' => 'admin',
                'updated_at' => '2024-09-09 18:36:34',
                'updated_by' => 'admin1',
                'delete_flg' => 0,
                'product_id' => 8,
            ],
            [
                'id' => 154,
                'piority' => 1,
                'path_image' => '/img/Products/Violin1.jpg',
                'start_date' => '2023-01-01 10:00:00',
                'end_date' => '2024-01-01 10:00:00',
                'created_at' => '2023-01-04 13:00:00',
                'created_by' => 'admin',
                'updated_at' => '2024-09-09 18:37:29',
                'updated_by' => 'admin1',
                'delete_flg' => 0,
                'product_id' => 9,
            ],
            [
                'id' => 155,
                'piority' => 1,
                'path_image' => '/img/Products/Violin2.jpg',
                'start_date' => '2023-01-01 10:00:00',
                'end_date' => '2024-01-01 10:00:00',
                'created_at' => '2023-01-05 14:00:00',
                'created_by' => 'admin',
                'updated_at' => '2024-09-09 18:37:41',
                'updated_by' => 'admin1',
                'delete_flg' => 0,
                'product_id' => 12,
            ],
            [
                'id' => 156,
                'piority' => 1,
                'path_image' => '/img/Products/Guitar2.jpg',
                'start_date' => '2024-09-09 18:36:57',
                'end_date' => '2024-09-09 18:37:00',
                'created_at' => '2024-09-09 18:37:07',
                'created_by' => 'admin1',
                'updated_at' => '2024-09-09 18:37:07',
                'updated_by' => 'admin1',
                'delete_flg' => 0,
                'product_id' => 11,
            ],
        ];

        $table = $this->table('image_products');
        $table->insert($data)->save();
    }
}
