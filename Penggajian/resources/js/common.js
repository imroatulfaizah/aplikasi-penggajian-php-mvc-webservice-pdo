/**
 * @Author  : David Naista<davidnaista83@gmail.com>
 * @Date    : 12/17/15 - 10:58 AM
 */

$(document).ready(function() {

    $(".paging-table").DataTable({

        "ordering": false,
        "info":     false,

        "language": {
            "emptyTable": "Tidak ada data"
        },

        aLengthMenu: [
            [25, 50, 100, 200, -1],
            [25, 50, 100, 200, "Semua"]
        ]
    });
});