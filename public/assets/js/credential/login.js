const FORM = 'login-form';

//SUBMIT THE FORM
document.getElementById(FORM).addEventListener('submit', async (e) => {
    e.preventDefault();
    const form = new FormData(e.target);
    const res = await fetch (`login/auth`, { 
        method: 'POST', 
        body: form 
    });
    const data = await res.json();
    console.log(data);
    if (data.success) {
        Swal.fire({
            icon: 'success',
            title: 'Congratulations!',
            text: 'You logged in successfully!',
        })
        setTimeout(function(){
            window.location.href = `/dashboard`;
        }, 1000);
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Login Error',
            text: `${data.message}`,
        })
    }
});


