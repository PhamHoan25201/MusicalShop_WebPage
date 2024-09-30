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
use Cake\Auth\DefaultPasswordHasher;
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
        $this->loadComponent('Data');
        $this->loadModel("Users");

        $this->Authentication->addUnauthenticatedActions(['index', 'myPage', 'customerInfo', 'customerChange', 'passwordChange', 'login', 'logout', 'forgotPassword' ]);
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
        // Khởi tạo data
        $data = null;

        // Kiểm tra xem đã login chưa
		$session = $this->request->getSession();
		if (!$session->check('dataLogin')) {
			return $this->redirect(['action' => 'login']);
		}

        // Trường hợp post dữ liệu
		if ($this->request->is('post')) {
			$atribute = $this->request->getData();

			if (($atribute['passwordOld'] == '') || ($atribute['passwordNew'] == '') || ($atribute['passwordReNew'] == '')) {
				$this->Flash->error(__('Vui lòng điền đầy đủ các trường và thử lại.'));
				$data = $atribute;
			} else {

				// check retype Password
				if (!($atribute['passwordNew'] == $atribute['passwordReNew'])) {
					$this->Flash->error(__('Mật khẩu không khớp. Vui lòng kiểm tra lại!!!'));
					$data = $atribute;
				} else {
					if(($atribute['passwordOld'] == $atribute['passwordNew'])){
						$this->Flash->error(__('Mật khẩu không có sự thay đổi. Vui lòng kiểm tra lại!!!'));
						$data = $atribute;
					}else{
						$email = $session->read('dataLogin.email');
						$dataUser = $this->{'Data'}->getUsersByEmail($email);

						$hashPswdObj = new DefaultPasswordHasher;
						$checkPassword =  $hashPswdObj->check($atribute['passwordOld'], $dataUser['password']);

						if ($checkPassword) {
                            // Set thuộc tính pasword để lưu
                            $atribute['password'] = $atribute['passwordNew'];
							$user = $this->Users->patchEntity($dataUser, $atribute);
							if ($user->hasErrors()) {
								$error = $user->getErrors();
								$this->set('error', $error);
								$data = $atribute;
							} else {
								$newpass = $hashPswdObj->hash($atribute['password']);
								$user->password = $newpass;
								if ($this->Users->save($user)) {
									$this->Flash->success('Thay đổi mật khẩu thành công!!!');
								} else {
									$this->Flash->error(__('Thay đổi mật khẩu không thành công!!!'));
									$data = $atribute;
								}
							}
						} else {
							$this->Flash->error(__('Mật khẩu không chính xác.'));
							$data = $atribute;
						}
					}
				}
			}
		}

		$this->set('dataPassword', $data);
        
    }

    /**
     * login method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function login()
    {
        // Kiểm tra xem đã login chưa
		$session = $this->request->getSession();
		if ($session->check('dataLogin')) {
			return $this->redirect(['action' => 'myPage']);
		}

        // Trường hợp là post
		if ($this->request->is('post')) {
			$email = $this->request->getData('email');

			$password = $this->request->getData('password');

			//Lưu oldValue
			$session->write('email', $email);
			$session->write('password', $password);

			// Check rỗng và check đổi name F12
			if ($email == null || $password == null) {
				$this->Flash->error('Vui lòng điền đầy đủ các trường và thử lại.');
				return $this->redirect(['action' => '']);
			}

			$atribute = $this->request->getData();
			$hashPswdObj = new DefaultPasswordHasher;
			$passwordDB = $this->{'Data'}->getPws($email);

			//Check email tồn tại
			$dataUserArr = $this->{'Data'}->getUsersByEmailArr($email);
			if (count($dataUserArr) < 1) {
				$this->Flash->error('Email không tồn tại');
				return $this->redirect(['action' => '']);
			} else {
				$checkPassword =  $hashPswdObj->check($password, $passwordDB[0]['password']);

				// checkpass bằng mã hash
				if ($checkPassword) {
					$result = $this->{'Data'}->checklogin($atribute);

					if (count($result) > 0) {
						//  Ghi Data Login vào session
						$session->write('dataLogin', $result[0]);

						return $this->redirect(['action' => 'myPage']);
					} else {
						$this->Flash->error('Email hoặc password không chính xác');
					}
				} else {
					$this->Flash->error('Email hoặc password không chính xác');
				}
			}
		}    
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

    /**
     * logout method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function logout()
    {
        $session = $this->request->getSession();
        $session->destroy();
        return $this->redirect(['action' => 'login']);
    }
}
