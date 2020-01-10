<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentSearch */
/* @var $students */

$this->title = Yii::t('app', 'Students');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo "<pre>"; var_dump($students); ?>

<div class="member-view text-center">


<h2 class="text-center">
    <?= $students ?>
</h2>
<h3 class="text-center">
    <?= $searchModel->faculty ?>
</h3>

<div class="mt-5"></div>

<?=
Html::a('За', ['index?type=3&memberid='. Yii::$app->getUser()->getId()], ['class' => 'btn btn-success btn-bg  mr-1', 'style' => 'width: 100px; font-size: 22px;'] ) .
Html::a('Против', ['index?type=1&memberid='. Yii::$app->getUser()->getId()], ['class' => 'btn btn-danger btn-bg  mr-1', 'style' => 'width: 100px; font-size: 22px;'] )
?>
</div>