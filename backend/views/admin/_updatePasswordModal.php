<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/7/31
 * Time: 13:28
 */

$modal = \yii\bootstrap\Modal::begin([
    'header' => '<h2>修改密码</h2>',
    'toggleButton' => false,
]);
?>
<form class="form-inline" action="/admin/update-pwd" id="updatePwdForm">
    <div class="alert alert-success hidden" id="updatePwdSuccAlert">
        <a href="#" class="close" data-dismiss="alert">
            &times;
        </a>
        <span id="updatePwdSuccText"></span>
    </div>
    <div class="alert alert-warning hidden" id="updatePwdErrorAlert">
        <a href="#" class="close" data-dismiss="alert">
            &times;
        </a>
        <span id="updatePwdErrorText"></span>。
    </div>
    <div class="form-group">
        <label class="sr-only" for="username">用户名</label>
        <input type="hidden" name="userId" value="" id="userId">
        <input type="text" class="form-control" id="updateUsername" placeholder="用户名" disabled>
    </div>
    <div class="form-group">
        <label class="sr-only" for="password">密码</label>
        <input type="password" class="form-control" id="updatePassword" name="updatePassword" placeholder="密码" >
    </div>
    <button type="button" class="btn btn-default" id="updatePwdBtn" data-loading-text="sending...">提交</button>
</form>
<?php
\yii\bootstrap\Modal::end();
?>

<?php
\common\widgets\JSRegister::begin();
?>
<script>

    $('.modal-update-pwd').click(function() {
        var uid = $(this).attr('modal-data-uid');
        var username = $(this).attr('modal-data-username');
        $('#userId').val(uid);
        $('#updateUsername').val(username);
        $('#updatePassword').val('');
        $('#<?= $modal->id ?>').modal();

        $('#updatePwdSuccAlert').addClass('hidden');
        $('#updatePwdSuccText').text('');
        $('#updatePwdErrorAlert').addClass('hidden');
        $('#updatePwdErrorText').text('');
    });
    jQuery('#updatePwdBtn').click(function() {
        $('#updatePwdBtn').button('loading');
        var form = $('form#updatePwdForm');
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function (data) {
                $('#updatePwdBtn').button('reset');
                if (data.error=='0') {
                    $('#updatePwdSuccAlert').removeClass('hidden');
                    $('#updatePwdSuccText').text(data.msg);
                } else {
                    $('#updatePwdErrorAlert').removeClass('hidden');
                    $('#updatePwdErrorText').text(data.msg);
                }
            }
        });
    });
</script>
<?php
\common\widgets\JSRegister::end();
?>
