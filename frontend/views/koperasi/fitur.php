<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use lo\widgets\Toggle;

$this->title = "Koperasi - Fitur";

\yii\web\YiiAsset::register($this);
?>

<div class="fitur-koperasi">

    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'status')->widget(Toggle::className()); ?>

    <?php ActiveForm::end() ?>

</div>

<?php

    $this->registerJs("
        var koperasiField = $('.field-koperasi-status');
        var koperasiStatus = $('.field-koperasi-status > .toggle');

        $(document).ready(function() {
            koperasiField.click(function() {
                if(koperasiField.children().hasClass('btn-success')) { 
                    console.log('success');
                } else {
                    console.log('fail');
                }
            });
        });

    ", $this::POS_END);

?>