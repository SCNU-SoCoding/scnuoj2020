<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Problem */
/* @var $solution app\models\Solution */
/* @var $submissions array */

$this->title = Yii::t('app', 'Editorial');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Problems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id . ' - ' . $model->title, 'url' => ['/problem/view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editorial');
?>
<div class="news-view">
    <h1 class="news-title">
        <?= Html::a(Html::encode($this->title), ['/problem/view', 'id' => $model->id]) ?>
    </h1>
    <div class="news-content">
        <?= Yii::$app->formatter->asMarkdown($model->solution) ?>
    </div>
</div>
