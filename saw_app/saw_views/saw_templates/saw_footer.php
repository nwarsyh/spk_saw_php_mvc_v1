<div class="modal fade text-left" id="AkhiriSesi" tabindex="-1" role="dialog" aria-labelledby="AkhiriSesiLabel" data-bs-backdrop="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="AkhiriSesiLabel">Akhiri Sesi Anda</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <span>Apakah Anda yakin ingin keluar dari aplikasi,<br>Silahkan klik tombol "Logout" jika anda ingin mengakhiri sesi anda saat ini</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary text-white" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Batal</span>
                </button>
                <a href="<?= BASEURL; ?>/SAW_SignIn/SAW_doLogout" class="btn btn-sm btn-primary ms-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Logout</span>
                </a>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2023 &copy; SPK SAW by: Anwarsyah/<a href="https://github.com/nwarsyh" target="_blank"><b>@nwarsyh</b></a></p>
        </div>
        <div class="float-end">
            <p>Referensi Design By : <a href="https://zuramai.github.io/mazer/" target="_blank">Mazer Template</a></p>
        </div>
    </div>
</footer>
</div>
</div>
<script src="<?= BASEURL; ?>/saw_assets/js/dark.js"></script>
<script src="<?= BASEURL; ?>/saw_assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= BASEURL; ?>/saw_assets/js/app.js"></script>
</body>
</html>