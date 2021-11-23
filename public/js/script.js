$(function () {
    $(".tampilUbah").on("click", function () {
        const id = $(this).data("id")

        $.ajax({
            url: "http://localhost/phpmvc/public/product/getUbah",
            data: { id: id },
            method: "post",
            dataType: "json",
            success: function (data) {
                $("#nama").val(data.nama);

                console.log($("#gambar").val(data.gambar));
                $("#gambar").val(data.gambar);
                $("#berat").val(data.berat);
                $("#jumlah").val(data.jumlah);
                $("#harga").val(data.harga);
                $("#id").val(data.id);
            }
        })
    })
})





// function actionBtn(dataId) {
//     let id = $('#btn-' + dataId).attr('data-id')

//     $.ajax({
//         url: "http://localhost/php/phpmvc/public/product/getUbah",
//         data: { id: id },
//         method: "post",
//         success: function (data) {
//             $("#nama").val(data.nama)
//         }
//     })
// }

// $(() => { })
