<?php 

/**
 * This is the model class for table "orderDetail".
 *
 * The followings are the available columns in table 'orderDetail':
 * @property integer $ID
 * @property integer $orId
 * @property integer $proId
 * @property string $proTitle
 * @property double $proPrice
 * @property string $proImg
 * @property integer $quantity
 * @property string $inserted
 */
class OrderDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orderdetail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('orId, proId, proTitle, proPrice, proImg, quantity, inserted', 'required'),
			array('orId, proId, quantity', 'numerical', 'integerOnly'=>true),
			array('proPrice', 'numerical'),
			array('proTitle', 'length', 'max'=>50),
			array('proImg', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, orId, proId, proTitle, proPrice, proImg, quantity, inserted', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'orId' => 'Or',
			'proId' => 'Pro',
			'proTitle' => 'Pro Title',
			'proPrice' => 'Pro Price',
			'proImg' => 'Pro Img',
			'quantity' => 'Quantity',
			'inserted' => 'Inserted',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('orId',$this->orId);
		$criteria->compare('proId',$this->proId);
		$criteria->compare('proTitle',$this->proTitle,true);
		$criteria->compare('proPrice',$this->proPrice);
		$criteria->compare('proImg',$this->proImg,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('inserted',$this->inserted,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function setProduct($product){
		$this->proId = $product->proId;
		$this->proTitle = $product->proTitle;
		$this->proPrice = $product->proPrice;
		$this->proImg = $product->proImg;
		$this->quantity = 1;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrderDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
