<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentSearch */
/* @var $data */

//var_dump("<pre>", $data); die;

$this->title = Yii::t('app', 'Students');
Html::encode($this->title)
?>

<?php //echo "<pre>"; var_dump($students); ?>
<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-8 m-auto text-center st_div_wrapper">
        <div class="col-12">
            <span class="">ФИО</span>
            <h3><?= $data['name'] ?></h3>
            <span class="">Специальность</span>
            <h3><?= $data['specialty'] ?></h3>
            <span class="">Тема</span>
            <h3 class="text-decoration-underline"><?= $data['theme'] ?></h3>
        </div>
        <div id="button_voting" class="col-12">
            <?=
            Html::a('За', ['index?type=1&memberid=' . Yii::$app->getUser()->getId()],
                ['id' => 'vote_for', 'class' => 'btn btn-success btn-bg  mr-1', 'style' => 'width: 100px; font-size: 22px;']) .
            Html::a('Против', ['index?type=2&memberid=' . Yii::$app->getUser()->getId()],
                ['id' => 'vote_against', 'class' => 'btn btn-danger btn-bg  mr-1', 'style' => 'width: 100px; font-size: 22px;'])
            ?>
        </div>
    </div>
</div>

<div id="myModalBox" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3>Спасибо</h3>
            </div>
            <div class="modal-body text-center">

            </div>

        </div>
    </div>
</div>

<?php
$js = <<<JS
    $('#button_voting').on('click', function(event) {
        event.preventDefault();
        let elem = new URL(event.target);
        let parseUrl = elem.search.replace('?', '').trim();
        console.log(parseUrl);

        $.ajax({
            url: elem.pathname,
            type: 'POST',
            data: parseUrl,
            success: function(data) {
                $('#myModalBox').modal('show');
                $('.modal-body').text(data);
            },
            error: function(jqXHR, txtStatus, error) {
              alert(error);
            }
        });
        return false;
    });

JS;
$this->registerJs($js, \yii\web\View::POS_END);

?>