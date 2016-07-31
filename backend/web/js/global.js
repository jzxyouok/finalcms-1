/**
 * Created by jun on 2016/7/31.
 */
$(document).on('pjax:send', function(){
    $('button[data-loading-text]').button('loading');
});
