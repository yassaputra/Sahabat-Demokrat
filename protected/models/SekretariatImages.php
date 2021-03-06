<?php

/**
 * This is the model class for table "sekretariat_images".
 *
 * The followings are the available columns in table 'sekretariat_images':
 * @property integer $img_id
 * @property integer $sekretariat
 * @property string $images
 * @property string $img_type
 * @property string $date_add
 *
 * The followings are the available model relations:
 * @property Sekretariat $sekretariat0
 */
class SekretariatImages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sekretariat_images';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_add', 'required'),
			array('sekretariat', 'numerical', 'integerOnly'=>true),
			array('img_type', 'length', 'max'=>10),
			array('images', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('img_id, sekretariat, images, img_type, date_add', 'safe', 'on'=>'search'),
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
			'sekretariat0' => array(self::BELONGS_TO, 'Sekretariat', 'sekretariat'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'img_id' => 'Img',
			'sekretariat' => 'Sekretariat',
			'images' => 'Images',
			'img_type' => 'Img Type',
			'date_add' => 'Date Add',
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

		$criteria->compare('img_id',$this->img_id);
		$criteria->compare('sekretariat',$this->sekretariat);
		$criteria->compare('images',$this->images,true);
		$criteria->compare('img_type',$this->img_type,true);
		$criteria->compare('date_add',$this->date_add,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SekretariatImages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
