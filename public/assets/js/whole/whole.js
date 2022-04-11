getProfile();

const userData = [
    'username',
    'user_firstname',
    'user_lastname',
];

async function getProfile() {
    const res = await fetch(`/Profile/getUserId/${user.user_id}`);
    const data = await res.json();

    
    userData.forEach(personal => {
        const elem = document.querySelector(`input#${personal}`);
        if (elem) elem.value = data[personal] || ''

        const elemDiv = document.querySelector(`#${personal}`);
        if (elemDiv) elemDiv.innerHTML = data[personal] || ''
        
    });

    const elemH2 = document.querySelector('.user_firstname');
    if (elemH2) elemH2.innerHTML = data['user_firstname'] + ' ' + data['user_lastname'];

    const elemH6 = document.querySelector('#user');
    if (elemH6) elemH6.innerHTML = data['user_firstname'] + ' ' + data['user_lastname'];

    const headerSpan = document.querySelector('#header_username');
    if (headerSpan) headerSpan.innerHTML = 'Hi' + ' ' + data['username'];
}

const editForm = 'edit_profile';

document.getElementById(editForm)?.addEventListener('submit', async (e) => {
    e.preventDefault();

    const form = new FormData(e.target);
  
    const res = await fetch(`Profile/update/${user.user_id}`, {
        method: 'POST',
        body: form
    });
    const data = await res.json();
    if (data.success) {
        getProfile();
        Swal.fire({
            icon: 'success',
            title: 'Congratulations!',
            text: 'Successfully Updated!',
        })
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Update Error',
            text: `${data.message}`,
        })
    }
});



