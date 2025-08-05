$(document).ready(function () {
    $(".table").DataTable({
        responsive: true,
        scrollX: true,
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"],
        ],
        dom: '<"row d-flex justify-content-center g-1"<"col-lg-6"l><"col-lg-6"f><"col-lg-12"t><"col-lg-12"p>>',
        columnDefs: [
            { className: "dt-center", targets: ["_all"] }, // Ganti [0, 1, 2] dengan indeks kolom yang ingin Anda tengahkan.
        ],

        // buttons: [
        //     {
        //         extend: "excel",
        //         className: "btn btn-success rounded-0",
        //         text: "Unduh Excel",
        //     },
        // ],
    });
});
