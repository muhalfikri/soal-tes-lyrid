$('#loginform').submit(function(e){
    e.preventDefault();
    var post = $('#loginform').serialize();
    $.post(base_url+'/auth/login_process', post, function(res){
        if (res.code === 200) {
            let timerInterval
            Swal.fire({
                title : 'Success!',
                icon  : 'success',
                html  : res.message,
                timer : 1500,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 1500)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            })

            setTimeout(function(){
                location.href = base_url+'/dashboard';
            }, 1500);
        } else {
            Swal.fire({
                title : 'Failed!',
                text : res.message,
                icon : 'error'
            });
        }
    }, 'json');
});