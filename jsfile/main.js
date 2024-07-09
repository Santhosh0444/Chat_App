
function showPassword(passCheck, element) {
    if(passCheck.checked){
        element.type='text';
    }
    else {
        element.type='password';
    }
}


// error functions

function popAlerts(message='success', type='success') {
    let alerts = document.createElement('div');
    alerts.classList.add('alerts');
    alerts.innerHTML = `
    <div class="${type} con">
                    <span>${message}</span>
                    <span class="canAlert">&times;</span>
                </div>
    `;
    $('.alertsMessages').append(alerts);
    timer = setTimeout(function () {
        alerts.remove();
    }, 3000);
    removeAlerts();
}

function removeAlerts() {
    $('.alertsMessages>.alerts>.con>.canAlert').click(function() {
        clearTimeout(timer);
        $(this)[0].parentElement.parentElement.remove();
    });
}