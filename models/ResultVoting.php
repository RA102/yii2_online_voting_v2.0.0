<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "result_voting".
 *
 * @property int $id
 * @property int $student_id
 * @property int $user_id
 * @property int $bulletin_type_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property BulletinType $bulletinType
 * @property Student $student
 * @property User $user
 */
class ResultVoting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'result_voting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'user_id', 'bulletin_type_id', 'created_at', 'updated_at'], 'integer'],
            [['bulletin_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => BulletinType::className(), 'targetAttribute' => ['bulletin_type_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'bulletin_type_id' => Yii::t('app', 'Bulletin Type ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBulletinType()
    {
        return $this->hasOne(BulletinType::className(), ['id' => 'bulletin_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
