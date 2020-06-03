const file = async (file, callbackOK) => {
    const response = await fetch(file)
    const text = await response.text()
    callbackOK.call(null, JSON.parse(text));
}
Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

scrollFunction = evt => {
    const nav = document.querySelector(".header__nav");
    const scrolled = window.scrollY;
    const top = 40;
    if (scrolled < top) {
        nav.classList.remove("header__scroll");
        return;
    }
    nav.classList.add("header__scroll");
}
enviar = t => {
    let url = t.action;
    let method = t.method;
    let formElement = t;
    let formData = new FormData( formElement );
    const forms = document.querySelectorAll(".form-control");
    Array.prototype.forEach.call(forms, e => { e.readOnly = true; });
    file('assets/txt/keys.txt', data => {
        grecaptcha.ready(function() {
            Toast.fire({
                icon: 'warning',
                title: 'Espere, enviando'
            });
            grecaptcha.execute(data.public, {action: 'contact'}).then( function( token ) {
                formData.append( "token", token );
                axios({
                    method: method,
                    url: url,
                    data: formData,
                    responseType: 'json',
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                })
                .then((res) => {
                    Array.prototype.forEach.call(forms, e => { e.readOnly = false; });
                    if (!parseInt(res.data.error)) {
                        Array.prototype.forEach.call(forms, e => { e.value = ""; });
                        Toast.fire({
                            icon: 'success',
                            title: res.data.msg,
                        });
                    } else
                        Toast.fire({
                            icon: 'error',
                            title: res.data.msg,
                        });
                })
                .catch(err => {
                    console.error(err);
                    Toast.fire({
                        icon: 'error',
                        title: 'Ocurrió un error'
                    });
                })
                .then(() => {});
            });
        });
    })
};
window.onscroll = scrollFunction;