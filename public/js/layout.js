document.addEventListener('DOMContentLoaded', () => {
    const wrapper = document.getElementById('wrapper');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const body = document.getElementById('page-body');
    const toggleButton = document.getElementById('darkModeToggle');
    const toggleIcon = document.getElementById('darkModeIcon');

    const savedSidebarState = localStorage.getItem('sidebarState');

    if (wrapper && sidebarToggle) {
        if (savedSidebarState === 'visible') {
            wrapper.classList.remove('toggled');
        } else {
            wrapper.classList.add('toggled');
        }

        sidebarToggle.addEventListener('click', () => {
            wrapper.classList.toggle('toggled');
            if (wrapper.classList.contains('toggled')) {
                localStorage.setItem('sidebarState', 'hidden');
            } else {
                localStorage.setItem('sidebarState', 'visible');
            }
        });
    }
});
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("wrapper").classList.add("toggled");
});

// id trnsaksi
    var transaksiModal = document.getElementById('transaksiModal');
    transaksiModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // tombol yang klik
        var mobilId = button.getAttribute('data-id'); // ambil id mobil
        transaksiModal.querySelector('#mobil_id').value = mobilId;
    });


    //upload foto mobil
        document.getElementById('foto_mobil').addEventListener('change', function() {
            document.getElementById('nama-file').innerText =
                this.files.length ? this.files[0].name : 'Pilih foto mobil';
        });
        document.getElementById('foto_mobil').addEventListener('change', function() {
            if (this.files.length > 0) {
                document.getElementById('nama-file').innerText = this.files[0].name;
            }
        });

// notif toast
document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;
    const success = body.dataset.toastSuccess;
    const error = body.dataset.toastError;

    if (success) panggilToast('berhasil', success);
    if (error) panggilToast('gagal', error);
});

// Fungsi panggilToast
function panggilToast(status, message) {
    const wadah = document.getElementById('toast-box') || createToastBox();
    const div = document.createElement('div');

    if (status === 'berhasil') {
        div.className = 'notif-oval sukses';
        div.innerHTML = `
            <div class="icon-bulat">
                <svg width="20" height="20" viewBox="0 0 20 20">
                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                </svg>
            </div>
            <div class="pesan-teks">${message}</div>
        `;
    } else {
        div.className = 'notif-oval gagal';
        div.innerHTML = `
            <div class="icon-bulat">
                <svg width="20" height="20" viewBox="0 0 20 20">
                    <path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/>
                </svg>
            </div>
            <div class="pesan-teks">${message}</div>
        `;
    }

    wadah.appendChild(div);

    // Hilang sendiri setelah 3 detik
    setTimeout(() => {
        div.style.transition = "0.5s";
        div.style.opacity = "0";
        div.style.transform = "translateY(-20px)";
        setTimeout(() => div.remove(), 500);
    }, 3000);
}

// Jika div #toast-box belum ada, buat otomatis
function createToastBox() {
    const div = document.createElement('div');
    div.id = 'toast-box';
    div.style.position = 'fixed';
    div.style.top = '20px';
    div.style.right = '20px';
    div.style.zIndex = '9999';
    document.body.appendChild(div);
    return div;
}



