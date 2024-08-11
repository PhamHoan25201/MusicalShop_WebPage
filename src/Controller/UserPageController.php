<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\Table;
/**
 * UserPage Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserPageController extends AppController
{
    
    public function initialize(): void
    {
        parent::initialize();

        $this->Authentication->addUnauthenticatedActions(['index', 'myPage', 'customerInfo', 'customerChange', 'passwordChange', 'cart', 'purchaseHistoryList', 'purchaseHistoryDetail', 'confirmCancelOrder', 'completeCancelOrder' ]);

    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    { 
        
    }

    /**
     * MyPage method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function myPage()
    { 
        
    }

    /**
     * customerInfo method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function customerInfo()
    { 
        
    }

    /**
     * customerChange method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function customerChange()
    {
        
    }

    /**
     * passwordChange method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function passwordChange()
    {
        
    }

    /**
     * cart method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function cart()
    {
        
    }

    /**
     * purchaseHistoryList method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function purchaseHistoryList()
    {
        
    }

    /**
     * PurchaseHistoryDetail method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function purchaseHistoryDetail()
    {
        
    }

    /**
     * ConfirmCancelOrder method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function confirmCancelOrder()
    {
        
    }

    /**
     * CompleteCancelOrder method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function completeCancelOrder()
    {
        
    }
}
