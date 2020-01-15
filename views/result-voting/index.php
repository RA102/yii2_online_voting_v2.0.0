<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ResultVotingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Result Votings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="result-voting-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'student.name',
            'user.username',
            'bulletinType.bulletin_name',
            'created_at' => [
                'value' => function ($data) {
                    return date('H:i:s d-m-Y', $data->created_at) ;
                }
            ],
            'updated_at' => [
                'value' => function ($data) {
                    return date('H:i:s d-m-Y', $data->updated_at);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
