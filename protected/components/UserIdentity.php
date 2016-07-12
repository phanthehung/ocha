<?php 

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
    
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	
	public function authenticate()
	{
		$password = md5($_POST['password']);							
		$user = Customer::model()->findByAttributes(array(
			'username' => $this->username));
		if ($user === null) {
			$this->errorCode = 'Username không tồn tại';
		} else {
			if ($user->password == md5($this->password)) {
				$this->_id = $user->id;
				$auth = Yii::app()->authManager;
				if (!$auth->isAssigned($user->role->name, $this->_id)) {
					if ($auth->assign($user->role->name, $this->_id)) {
						Yii::app()->authManager->save();
					}
				}
						// 	$session = Yii::app()->session;
						// $session->open();
						// $session['guest'] = "hung";
						// $session->close();
                        //$this->setState('level', $user->role->level);
                        // $this->setState('parts', $user->role->parts);
                        //$_SESSION['ckeditor']['role'] = $user->role->alias;
                        //$_SESSION['ckeditor']['username'] = $user->s_username;
                        // $this->setState('fullname', $user->s_fullname != '' ? $user->s_fullname : $user->s_username);
                        //$this->setState('storeID', $user->i_store_id);
                        //$this->setState('params', $user->s_params);
				$this->setState('address', $user->address);
				$this->setState('username', $user->username);
				$this->setState('email', $user->email);
				$this->setState('phone', $user->phone);
				$this->setState('id', $user->id);
				$this->setState('role', $user->role->name);

				$this->errorCode = self::ERROR_NONE;
			}else{
				$this->errorCode = 'Mật khẩu không đúng ';
			}
		}
		return $this->errorCode;
	}

	public function getId(){
        return $this->_id;
    }
}