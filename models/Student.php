<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $name
 * @property string $faculty
 * @property string $code
 * @property string $specialty
 * @property string $theme
 * @property int $status_student
 *
 * @property StatusStudent $statusStudent
 */
class Student extends \yii\db\ActiveRecord
{

    const MARK_ACTIVE = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['name', 'code', 'specialty', 'theme'], 'string', 'max' => 255],
            [['status_student'], 'exist', 'skipOnError' => true, 'targetClass' => StatusStudent::className(), 'targetAttribute' => ['status_student' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

            'name' => Yii::t('app', 'Name'),
            'code' => 'Code',
            'specialty' => 'Specialty',
            'theme' => 'Theme',
            'status_student' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusStudent()
    {
        return $this->hasOne(StatusStudent::className(), ['id' => 'status_student']);
    }

    public static function setActiveStudent($id)
    {
        return Student::findOne(['id' => $id]);
    }


}
