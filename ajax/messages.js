$(document).ready(function(){
    setInterval(showMessage, 500);
    // showMessage();
    function showMessage() {
        let receiver = $('.messageInput textarea');
        $.ajax({
            url: "server/messages.php",
            dataType: 'html',
            method: 'post',
            data: {rec: receiver.attr('data-reciver') ?? null},
            success: function(e) {
                $('.messageBody').html(e);
                // console.log(e)
            }
        });
    }
});