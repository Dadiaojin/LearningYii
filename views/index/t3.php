<h1>T3</h1>
<!--调用view的t2.php，但不能含有php参数，除非再传参数-->
<?php
$echo="DADJINT3";
echo $this->render('t2',['echo'=>$echo])?>