document.addEventListener("DOMContentLoaded", function () {
    // Sidebar Toggle
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("sidebarToggle");
    if (toggleBtn) {
        toggleBtn.addEventListener("click", function () {
            if (window.innerWidth <= 991) {
                sidebar.classList.toggle("show");
            } else {
                sidebar.classList.toggle("collapsed");
            }
        });
    }

    // DataTables Init
    if (typeof $ !== "undefined" && $.fn.DataTable) {
        $(".datatable").DataTable({
            pageLength: 10,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ entri",
                paginate: { previous: "‹", next: "›" },
                emptyTable: "Tidak ada data",
            },
        });
    }

    // Auto-hide alerts
    setTimeout(() => {
        document.querySelectorAll(".alert-dismissible").forEach((a) => {
            const inst = bootstrap.Alert.getOrCreateInstance(a);
            inst.close();
        });
    }, 5000);

    // Image Preview
    document.querySelectorAll(".image-input").forEach((input) => {
        input.addEventListener("change", function (e) {
            const preview = document.querySelector(this.dataset.preview);
            if (preview && this.files[0]) {
                preview.src = URL.createObjectURL(this.files[0]);
                preview.style.display = "block";
            }
        });
    });

    // Delete Confirm
    document.querySelectorAll(".btn-delete").forEach((btn) => {
        btn.addEventListener("click", function (e) {
            if (!confirm("Apakah Anda yakin ingin menghapus data ini?"))
                e.preventDefault();
        });
    });

    // CKEditor Init
    document.querySelectorAll(".ckeditor").forEach((el) => {
        if (typeof ClassicEditor !== "undefined") {
            ClassicEditor.create(el).catch((err) => console.error(err));
        }
    });
});
