/**
 * Created by user on 04/09/2025.
 */
// bagian untuk sweetalerrt
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.alert-confirm-hapus').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const href = this.getAttribute('href'); // ambil URL dari tombol yang diklik
            Swal.fire({
                title: 'Yakin hapus data?',
                text: 'Data ini tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#198754',
                confirmButtonText: 'Ya, Saya Yakin!',
                cancelButtonText: 'Tidak, Saya Tidak Yakin'
            }).then((result) => {
                if (result.isConfirmed) {
                window.location.href = href; // otomatis ke URL sesuai tombol
            }
        });
        });
    });
});