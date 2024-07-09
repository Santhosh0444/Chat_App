
let inputPasswords = document.querySelectorAll('input[type="password"]'),
    passCheck = document.querySelector('.showPass input'),
    fileInput = document.querySelector('.dbImage input[type="file"]'),
    db = document.querySelector('.dbImage img');

passCheck.onclick = () => {
    inputPasswords.forEach(element => {
        showPassword(passCheck, element);
    });
};

fileInput.addEventListener('change', function(){
    let exeType = ['png', 'jpg', 'jpeg', 'svg'];
    let exe = this.value.split('.').pop();
    if(exeType.includes(exe)) {
        imgChange()
    }
    else {
        popAlerts('Please Upload only images', 'error');
        this.value = '';
    }
});


function imgChange(){
    if (fileInput.value != '') {
        file = fileInput.files[0];
        fileUrl = URL.createObjectURL(file);
        exe = file.name.split('.').reverse()[0];
        filename = file.name.split('.').reverse()[1].length < 10 ? file.name.split('.').reverse()[1] + ` (${exe})` : file.name.split('.').reverse()[1].slice(0, 10) + '...' + ` (${exe})`;
        fileInput.parentElement.classList.add('active');
    }
    else{
        filename = 'Upload Image';
        fileUrl = 'Asserts/Images/user.png';
        fileInput.parentElement.classList.remove('active');
    }
    db.src = fileUrl;
    fileInput.parentElement.children[2].innerHTML = filename;
}
