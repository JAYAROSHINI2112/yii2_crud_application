
<?php

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'View', 'url' => ['/student/index']]
        
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[]=[
            'label' => 'Logout('.yii::$app->user->identity->username.')',
            'url' =>['/site/logout'],
            'linkOptions'=>['data-method'=>'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    <?php echo $this->render('sidebar') ?>