$(document).ready(function () {
    let messageInput = $('.postSection .messageInput textarea');

    $('.postSection button.mesPost').click(loadMessages);

    function loadMessages() {
        $.ajax({
            url: 'server/sendmessages.php',
            method: 'post',
            dataType: 'html',
            data: { massage: messageInput.val(), receiver: messageInput[0].dataset.reciver},
            success: function (e) {
                if(e == 'send'){
                    messageInput.val('');
                }
                else if(e == 'notSend') {
                    popAlerts("Not send", 'error');
                }
                else {
                    $('.postSection .messageInput').css('border', '2px solid red');
                    setTimeout(function(){
                        $('.postSection .messageInput').css('border', 'none');
                    }, 3000);
                }
            }
        });
    }
});