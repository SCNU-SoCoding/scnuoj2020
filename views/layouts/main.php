<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="<?= Yii::getAlias('@web') ?>/favicon.ico">
</head>
<body>
<?php $this->beginBody() ?>

<div>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->setting->get('ojName'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg bg-light navbar-light',
        ],
        'innerContainerOptions' => ['class' => 'container']
    ]);
    $menuItemsLeft = [
        ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('app', 'Problems'), 'url' => ['/problem/index']],
        ['label' => Yii::t('app', 'Status'), 'url' => ['/solution/index']],
        [
            'label' => Yii::t('app', 'Rating'),
            'url' => ['/rating/index'],
            'active' => Yii::$app->controller->id == 'rating'
        ],
        [
            'label' => Yii::t('app', 'Group'),
            'url' => Yii::$app->user->isGuest ? ['/group/index'] : ['/group/my-group']
        ],
        ['label' => Yii::t('app', 'Contests'), 'url' => ['/contest/index']],
        [
            'label' => Yii::t('app', 'Wiki'),
            'url' => ['/wiki/index'],
            'active' => Yii::$app->controller->id == 'wiki'
        ],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItemsLeft[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/signup']];
        $menuItemsLeft[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
    } else {
        if (Yii::$app->user->identity->isAdmin()) {
            $menuItemsLeft[] = [
                'label' => Yii::t('app', 'Backend'),
                'url' => ['/admin'],
                'active' => Yii::$app->controller->module->id == 'admin'
            ];
        }
        if  (Yii::$app->user->identity->isVip()) {
            $menuItemsLeft[] = [
                'label' => Yii::t('app', 'Backend'),
                'url' => ['/admin/problem'],
                'active' => Yii::$app->controller->module->id == 'admin'
            ];
        }
        $menuItemsLeft[] =  [
            'label' => Yii::$app->user->identity->nickname,
            'items' => [
                ['label' => Yii::t('app', 'Profile'), 'url' => ['/user/view', 'id' => Yii::$app->user->id]],
                ['label' => Yii::t('app', 'Setting'), 'url' => ['/user/setting', 'action' => 'profile']],
                ['label' => Yii::t('app', 'Logout'), 'url' => ['/site/logout']],
            ]
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $menuItemsLeft,
        'encodeLabels' => false,
        'activateParents' => true
    ]);
    NavBar::end();
    ?>
    <br /><br />

    <?php
    if (!Yii::$app->user->isGuest && Yii::$app->setting->get('mustVerifyEmail') && !Yii::$app->user->identity->isVerifyEmail()) {
        $a = Html::a('个人设置', ['/user/setting', 'action' => 'account']);
        echo "<div class=\"container\"><p class=\"bg-danger\">请前往设置页面验证您的邮箱：{$a}</p></div>";
    }
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!-- <footer class="footer">
    <div class="container">
    <p class="pull-left"><center>&copy; SCNU SoCoding <?= date('Y') ?></center></p>
        <!-- <p class="pull-left">&copy; <?= Yii::$app->setting->get('ojName') ?> OJ <?= date('Y') ?></p>
        <p class="pull-left">
            <?= Html::a (' 中文简体 ', '?lang=zh-CN') . '| ' .
            Html::a (' English ', '?lang=en') ;
            ?>
        </p> -->
    </div>
</footer> -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
