$(document).ready(function(){
    $('form').submit(function (e) {
        e.preventDefault();

        let frm = new FormData(this);
        let xhr = new XMLHttpRequest();
        xhr.open('post', 'server/login.php', true);
        xhr.onload = function () {
            if (xhr.status = 200) {
                if(xhr.response == 'success'){
                    popAlerts('Logined Successfully');
                    setTimeout(function(){
                        popAlerts('Redirecting...');
                        location.href = 'index.php';
                    },1000);
                }
                else {
                    popAlerts(xhr.response, 'error');
                }
            }
        }
        xhr.send(frm);
    });
})