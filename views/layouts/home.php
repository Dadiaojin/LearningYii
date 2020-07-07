
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title>DadjinTitle</title>
    <?php $this->head() ?>
</head>
<body>
<h1>公共模板</h1>
<!--下面的是接收来自view及其赋值的代码-->
<?= $content ?>
</body>
</html>
