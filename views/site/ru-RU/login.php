<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Login */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-lg-12 wrapper-loginForm d-flex">
        <div class=" loginForm-div mr-1 md-mr-0">
            <h3 class="text-center">Пожалуйста, заполните следующие поля для входа:</h3>
        </div>
        <div class=" loginForm-div">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => [
                    'class' => 'login-form',
    //                'tag' => false,
                ],
                'fieldConfig' => [
                    'options' => [
                        'tag' => false,
                    ],
                    'inputOptions' => [
                        'class' => false,
                    ],
                    'errorOptions' => [
                        'tag' => false
                    ],
                ],
            ]); ?>
            <div class="txtb">
                <?= $form->field($model, 'username')->textInput()->label(false)?>
                <?= Html::tag('span', '', ['data-placeholder' => 'Логин']) ?>
            </div>
            <div class="txtb">
                <?= $form->field($model, 'password')->passwordInput()->label(false) ?>
                <?= Html::tag('span', '', ['data-placeholder' => 'Пароль']) ?>
            </div>
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'logbtn', 'name' => 'login-button']) ?>
            </div>
            <div style="color:#999;margin:1em 0">
                Забыли пароль <?= Html::a('сбросить', ['site/request-password-reset']) ?>.<br>
                Регистрация <?= Html::a('Регистрация', ['site/signup']) ?>.
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
