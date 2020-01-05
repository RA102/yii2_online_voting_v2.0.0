<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bulletin_type".
 *
 * @property int $id
 * @property string $bulletin_name
 *
 * @property ResultVoting[] $resultVotings
 */
class BulletinType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bulletin_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bulletin_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bulletin_name' => 'Bulletin Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResultVotings()
    {
        return $this->hasMany(ResultVoting::className(), ['bulletin_type_id' => 'id']);
    }
}
