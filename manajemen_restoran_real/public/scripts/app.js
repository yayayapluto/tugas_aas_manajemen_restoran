document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    if (!form) {
        console.log("Gaada form");
        return;
    }

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        console.log("anjay");

        const formData = new FormData(document.querySelector("form"));
        console.log(formData);

        Swal.fire({
            title: "Memproses...",
            html: "Mohon tunggu...",
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: false,
            showConfirmButton: false,
            timerProgressBar: true,
        });

        fetch(document.querySelector("form").action, {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((res) => {
                console.log(res);
                Swal.close();
                Swal.fire({
                    icon: res.success ? "success" : "error",
                    title: res.success ? "Berhasil" : "Gagal",
                    html: `<p>${res.msg}</p>`,
                    position: "center",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                }).then(function () {
                    if (res.success) {
                        location.href =
                            res.route || document.querySelector("form").route;
                    }
                });
            })
            .catch((err) => {
                Swal.close();
                const res = err.responseJSON || {
                    msg: "Terjadi kesalahan. Silakan coba lagi. ",
                };
                const message = res.msg;
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    html: `<p>${message}</p>`,
                    position: "center",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            });

        return true;
    });
});
