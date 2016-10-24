<div class="navbar-wrapper">

    <?= Yii::t('app', 'Example') ?>

    <?= \yii\bootstrap\Html::a('Click', ['main/contact']) ?>


    <?php

    use yii\bootstrap\Html;

    if(\Yii::$app->language == 'ru'):
        echo Html::a('Go to English', array_merge(
            \Yii::$app->request->get(),
            [\Yii::$app->controller->route, 'language' => 'en']
        ));
    else:
        echo Html::a('Перейти на русский',  [\Yii::$app->controller->route, 'language' => 'ru']);
    endif;?>

    <?var_dump(\Yii::$app->request->get())?>
    <?var_dump(\Yii::$app->controller->route)?>

    <div class="navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">


                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">

                <?
                $menuItems[] = ['label' => 'Home', 'url' => '#'];
                $menuItems[] = ['label' => 'About', 'url' => '#'];
                $menuItems[] = ['label' => 'Agents', 'url' => '#'];
                $menuItems[] = ['label' => 'Blog', 'url' => '#'];
                $menuItems[] = ['label' => 'Contact', 'url' => '#'];

                echo \yii\bootstrap\Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => $menuItems,
                ]);
                ?>
            </div>
            <!-- #Nav Ends -->

        </div>
    </div>

</div>
<!-- #Header Starts -->





<div class="container">

    <!-- Header Starts -->
    <div class="header">
        <a href="index.html" ><img src="/images/logo.png"  alt="Realestate"></a>
        <?
        $menuItems = [];
        $menuItems[] = ['label' => 'Buy', 'url' => '#'];
        $menuItems[] = ['label' => 'Sale', 'url' => '#'];
        $menuItems[] = ['label' => 'Rent', 'url' => '#'];

        echo \yii\bootstrap\Nav::widget([
            'options' => ['class' => 'pull-right'],
            'items' => $menuItems,
        ]);
        ?>


    </div>
    <!-- #Header Starts -->
</div>