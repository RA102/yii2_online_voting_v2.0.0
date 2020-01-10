<?php

use app\models\Student;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Students');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Student'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'showFooter' => false,
        'options' => [
            'style' => ['text-align: center;'],
        ],
        'headerRowOptions' => [
                'style' => 'text-align: center;',
        ],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'specialty',
            'theme' => [
                'contentOptions' => [
                    'style' => 'max-width: max-content;',
                ],
                'headerOptions' => [
                        'style' => 'text-align: center;'
                ],
                'header' => 'Тема',
                'value' => function ($data) {
                    return $data->theme;
                }
            ],
            'status_student' => [
                'value' => function ($data) {
                    return $data->statusStudent->name_status;
                },
            ],
            '' => [
                'format' => 'raw',
                'contentOptions' => ['class' => 'd-table-cell text-center', 'style' => 'vertical-align: middle;'],
                'value' =>
                    function ($data) {
                        return Html::a('Назначить', ['index?active=2&student=' . $data->id],
                            ['class' => 'btn btn-success appoint btn-sm  mr-1 appoint']);
                    },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '100'],
                'template' => '{update} {delete}{link}',
                'contentOptions' => ['class' => 'd-table-cell text-center', 'style' => 'vertical-align: middle;'],
                'buttons' => [

                ],
            ],
        ],
    ]); ?>
