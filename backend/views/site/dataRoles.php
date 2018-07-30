<?php
use yii\grid\GridView;
$this->title = 'Data Roles';
?>
<?=
 GridView::widget([
  'dataProvider' => $dataProvider
 ])
?>