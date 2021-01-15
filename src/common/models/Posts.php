<?php

namespace alwaidz\cars\common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string|null $description
 * @property int|null $date
 * @property int|null $price
 * @property int|null $carid
 *
 * @property Car $car
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'price', 'carid'], 'integer'],
            [['description'], 'string', 'max' => 150],
            [['carid'], 'exist', 'skipOnError' => true, 'targetClass' => Cars::className(), 'targetAttribute' => ['carid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'date' => 'Date',
            'price' => 'Price',
            'carid' => 'Carid',
        ];
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasOne(Cars::className(), ['id' => 'carid']);
    }
}
