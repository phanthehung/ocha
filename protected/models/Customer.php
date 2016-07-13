<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $phone
 * @property string $address
 * @property integer $saleoff
 * @property string $role_name
 */
class Customer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('saleoff', 'numerical', 'integerOnly'=>true),
			array('email, username, password, phone, address', 'length', 'max'=>255),
			array('role_name', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, email, username, password, phone, address, saleoff, role_name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'role' => array(self::BELONGS_TO, 'Authitem', 'role_name'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'username' => 'Username',
			'password' => 'Password',
			'phone' => 'Phone',
			'address' => 'Address',
			'saleoff' => 'Saleoff',
			'role_name' => 'Role Name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('saleoff',$this->saleoff);
		$criteria->compare('role_name',$this->role_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function updateAssignmentItem($type,$id){
		if ($type==1) {
			return Yii::app()->db->createCommand()->update('authassignment',array('itemname'=>$this->role_name),"userid=:userid",array(':userid'=>$this->id));
		} else if($type==0) {
			return Yii::app()->db->createCommand()->insert('authassignment',array('itemname'=>$this->role_name,'userid'=>$this->id,'bizrule'=>'','data'=>''));
		}else{
			return Yii::app()->db->createCommand()->delete('authassignment',"userid=:userid",array(':userid'=>$id));
		}
		
		
	}

	public function getRolesList(){
		$results = Yii::app()->db->createCommand()
		    ->select('name')
		    ->from('authitem')
		    ->where('type=2 and name!="admin"')
		    ->queryColumn();
		$roles=array();
		foreach ($results as $role ) {
	    	$roles["$role"]=$role;
	    }
		return $roles;
	}

	public function getParents($item){
		$parrentNames = array();
		$parents = Rights::module()->getAuthorizer()->getAuthItemParents($item);
		foreach ($parents as $parent) {
			$parrentNames["$parent->name"] = $parent->name;
		}
		$parrentNames["$item"] = $item;
		return $parrentNames;
	}

}
