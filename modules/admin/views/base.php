
<?php $this->beginBlock('left'); ?>

<?php
$leftView = 'left' . ucfirst($this->context->leftSideBar);
$leftViewFile = Yii::getAlias('@app/modules/admin/views/'.$leftView.'.php');
$leftViewExists = file_exists($leftViewFile);
if ($leftViewExists) {
    include($leftViewFile);
}
?>

<?php $this->endBlock(); ?>