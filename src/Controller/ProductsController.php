<?php
//----------------------------------------------------------------------------
//
//  Project name : Musical Shop (WebPage)
//  Class Name   :
//  Overview     : Controller sản phẩm
//  Programmer   : TaiTD@SSV
//  Created Date : 2024/09/08
//  Version      :  0.0.0.1
//
//----------< History >--------------------------------------------------------
//  ID           : 
//  Programmer   :
//  Updated Date :
//  Comment      :
//  Version      :  
//-----------------------------------------------------------------------------

declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\Table;
/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    
    public function initialize(): void
    {
        parent::initialize();
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Brands'],
        ];

        $search = $this->request->getQuery('search');

        $query = $this->Products->find('search', ['search' => $search])
                            ->where(['Products.delete_flg' => 0]);

        $products = $this->paginate($query);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'Brands', 'CartDetails', 'ImageProducts', 'OrderDetails', 'Properties'],
        ]);

        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200])->all();
        $brands = $this->Products->Brands->find('list', ['limit' => 200])->all();
        $this->set(compact('product', 'categories', 'brands'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200])->all();
        $brands = $this->Products->Brands->find('list', ['limit' => 200])->all();
        $this->set(compact('product', 'categories', 'brands'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if($product)
        {
            $product->delete_flg = 1;
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been deleted.'));
            } else {
                $this->Flash->error(__('The product could not be deleted. Please, try again.'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Hiển thị toàn bộ danh sách sản phẩm
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function all()
    {
        $this->viewBuilder()->setLayout('product');
        
        //Sẽ dùng để get thông tin sản phẩm khi có DB
        // $products = $this->Products->find()
        //                            ->where(['Products.delete_flg' => 0])
        //                            ->all();

        // $this->set(compact('products'));
    }

    /**
     * Hiển thị toàn bộ danh sách sản phẩm theo kết quả tìm kiếm
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function search()
    {
        $this->viewBuilder()->setLayout('product');

        //Sẽ dùng để get thông tin sản phẩm khi có DB
        // $search = $this->request->getQuery('search');

        // $products = $this->Products->find('search', ['search' => $search])
        //                            ->where(['Products.delete_flg' => 0])
        //                            ->all();

        // $this->set(compact('products'));
    }

    /**
     * Hiển thị chi tiết sản phẩm theo product id
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException Khi không tìm được sản phẩm.
     */
    public function detail($id = null)
    {
        $this->viewBuilder()->setLayout('product');

        //Sẽ dùng để get thông tin sản phẩm khi có DB
        // $product = $this->Products->get($id, [
        //      'contain' => ['Categories', 'Brands', 'CartDetails', 'ImageProducts', 'OrderDetails', 'Properties'],
        // ]);

        // $this->set(compact('product'));
    }

    /**
     * Hiển thị danh sách sản phẩm theo category
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException Khi không tìm được category.
     */
    public function category($id = null)
    {
        $this->viewBuilder()->setLayout('product');
        
        //Sẽ dùng để get thông tin sản phẩm khi có DB
        // $products = $this->Products->find('all')
        //                            ->where(['Products.category_id' => $id])
        //                            ->all();

        // $this->set(compact('products'));
    }
}
