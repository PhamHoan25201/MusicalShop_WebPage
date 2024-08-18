<?php
//----------------------------------------------------------------------------
//
//  Project name : Musical Shop (WebPage)
//  Class Name   : UserPageController
//  Overview     : Controller cho User
//  Programmer   : HoanPV@SSV
//  Created Date : 2024/08/18
//  Version      : 0.1
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

        $this->Authentication->addUnauthenticatedActions(['index', 'myPage', 'customerInfo', 'customerChange', 'passwordChange' ]);

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
     * login method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function login()
    {
        
    }

    /**
     * register method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function register()
    {
        
    }
  
    /**
     * forgotPassword method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function forgotPassword()
    {
        
    }
}
