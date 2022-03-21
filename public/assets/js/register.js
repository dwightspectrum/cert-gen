const FORM = 'sign-up-form';

//SUBMIT THE FORM
document.getElementById(FORM).addEventListener('submit', async (e) => {
    e.preventDefault();

    const form = new FormData(e.target);

    const password = document.getElementById('password').value;
    const confirm = document.getElementById('confirm_password').value;

    if(password != confirm){
        Swal.fire({
            icon: 'error',
            title: 'Password Error',
            text: 'Password does not match!',
        })
    } else {
        const res = await fetch(`Login/create`, {
            method: 'POST',
            body: form
        });
        const data = await res.json();
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Congratulations!',
                text: `${data.message}`,
            })
            setTimeout(function(){
                window.location.href = `/login`;
            }, 1000);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Create Account Error',
                text: `${data.message}`,
            })
        }
    }
});


