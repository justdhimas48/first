$(function(){
    $('#dropdown-jenis-kelamin a').on("click", function(){
        $('#btn-jenis-kelamin').html($(this).html());
        $('#jenis-kelamin').val($(this).html());
    });

    $('#dropdown-jenis-pekerjaan a').on("click", function(){
        $('#btn-jenis-pekerjaan').html($(this).html());
        $('#jenis-pekerjaan').val($(this).html());
    });

    $('#dropdown-kategori-unit-kerja a').on("click", function(){
        var id = $(this).attr('data-id');
        $('#btn-kategori-unit-kerja').html($(this).html());
        $('#kategori-unit-kerja').val(id);
    });
})