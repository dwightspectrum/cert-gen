const changePass = 'change_password';

document.getElementById(changePass).addEventListener('submit', async (e) => {
    e.preventDefault();

    const form = new FormData(e.target);

    const newPassword = document.getElementById('new_password').value;
    const confirmPassword = document.getElementById('confirm_password').value;

    if (newPassword != confirmPassword) {
        Swal.fire({
            icon: 'error',
            title: 'Password Error',
            text: 'Password does not match!',
        })
    } else {
        const res = await fetch(`Profile/change_pass/${user.user_id}`, {
            method: 'POST',
            body: form
        });

        const data = await res.json();
     
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Congratulations!',
                text: `Successfully Updated!`,
            })
            
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Update Error',
                text: `${data.message}`,
            })
        }    
    }  
   
});