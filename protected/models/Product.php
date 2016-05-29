<?php 

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $proId
 * @property string $proTitle
 * @property double $proPrice
 * @property integer $index
 * @property string $proDescription
 * @property integer $proStt
 * @property string $proImg
 * @property string $proImg2
 * @property string $proImg3
 * @property integer $category
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proTitle, proPrice, proDescription, proImg, category', 'required'),
			array('index, proStt, category', 'numerical', 'integerOnly'=>true),
			array('proPrice', 'numerical'),
			array('proTitle', 'length', 'max'=>50),
			array('proImg, proImg2, proImg3', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('proId, proTitle, proPrice, index, proDescription, proStt, proImg, proImg2, proImg3, category', 'safe', 'on'=>'search'),
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
			'proId' => 'Pro',
			'proTitle' => 'Pro Title',
			'proPrice' => 'Pro Price',
			'index' => 'Index',
			'proDescription' => 'Pro Description',
			'proStt' => 'Pro Stt',
			'proImg' => 'Pro Img',
			'proImg2' => 'Pro Img2',
			'proImg3' => 'Pro Img3',
			'category' => 'Category',
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

		$criteria->compare('proId',$this->proId);
		$criteria->compare('proTitle',$this->proTitle,true);
		$criteria->compare('proPrice',$this->proPrice);
		$criteria->compare('index',$this->index);
		$criteria->compare('proDescription',$this->proDescription,true);
		$criteria->compare('proStt',$this->proStt);
		$criteria->compare('proImg',$this->proImg,true);
		$criteria->compare('proImg2',$this->proImg2,true);
		$criteria->compare('proImg3',$this->proImg3,true);
		$criteria->compare('category',$this->category);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getImage($data,$row){
		return "<img src='$data->proImg'>";
	}

	public function getImage2($data,$row){
		return "<img src='$data->proImg2'>";
	}

	public function getImage3($data,$row){
		return "<img src='$data->proImg3'>";
	}
}
