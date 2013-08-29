<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2 style="color:white;">Error <?php echo $code; ?></h2>

<div class="error" style="color:white;">
<?php echo CHtml::encode($message); ?>
</div>