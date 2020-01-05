<?php

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
        'showFooter' => true,
        'options' => [
            'style' => 'text-align: center;',
        ],
        'headerRowOptions' => [
                'style' => 'text-align: center;',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'code',
            'specialty',
            'theme',
            'status_student' => [
                    'value' => function($data) {
        return $data->status_student->name_status;

                    },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>


</div>
