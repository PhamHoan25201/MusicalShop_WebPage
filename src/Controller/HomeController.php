<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;

class HomeController extends AppController
{
    public function index()
    {
        // Thiết lập tiêu đề trang
        $this->set('title', 'Welcome to Home Page');

        // Lấy danh sách nhạc cụ
        $instrumentsTable = TableRegistry::getTableLocator()->get('Instruments');
        $instruments = $instrumentsTable->find('all')->toArray();
        $this->set('instruments', $instruments);

        // Lấy danh sách banner
        $bannersTable = TableRegistry::getTableLocator()->get('Banners');
        $banners = $bannersTable->find('all')->toArray();
        $this->set('banners', $banners);

        // Lấy danh sách nhạc cụ giảm giá
        $discountedInstruments = $instrumentsTable->find('all', [
            'conditions' => ['discount >' => 0]
        ])->toArray();
        $this->set('discountedInstruments', $discountedInstruments);

        // Lấy danh sách nhạc cụ bán chạy
        $bestSellingInstruments = $instrumentsTable->find('all', [
            'conditions' => ['sales >' => 100],
            'order' => ['sales' => 'DESC'],
            'limit' => 5
        ])->toArray();
        $this->set('bestSellingInstruments', $bestSellingInstruments);
    }

    public function showCategories() {
        // Kết nối đến cơ sở dữ liệu
        $db = new DatabaseConnection();
        $products = $db->query("SELECT * FROM products");

        // Gửi danh sách sản phẩm đến view
        include 'views/categories.php'; // giả sử bạn có file views/categories.php
    }
}
