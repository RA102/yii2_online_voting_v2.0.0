<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ResultVoting */

$this->title = Yii::t('app', 'Create Result Voting');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Result Votings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="result-voting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
