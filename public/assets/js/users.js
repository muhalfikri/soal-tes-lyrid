var table = $('.datatables').DataTable({
    'responsive': false,
    'scrollX': true,
    'processing': true,
    'serverside' : true,
    "ajax": base_url+"/users/data_list",
    "columns": [
        { "data": null },
        { "data": 'hash_user' },
        { "data": 'email' },
        { "data": 'nama_lengkap' },
        { "data": 'no_telp' },
        { "data": 'alamat' },
        { "data": 'nama_group' },
        { "targets": -1,
            data: 'foto',
            createdCell: function(td, cellData, rowData, row, col){
                var output = '<img src="'+base_url+rowData.foto+'" width="100px">';
                $(td).html(output);
            }
        },
        { "targets": -1,
            data: 'id',
            createdCell: function(td, cellData, rowData, row, col){
                var output = '';
                if (rowData.id_group !== '1') {
                    output += '<div class="btn-group">';
                        output += '<button type="button" class="btn btn-info btn-sm edit" data-id="'+rowData.id+'"><i class="fa fa-search"></i> Edit </button>';
                        output += '<button type="button" class="btn btn-success btn-sm ubah" data-id="'+rowData.id+'"><i class="fa fa-edit"></i> Ubah Password </button>';
                        output += '<a href="'+base_url+'users/delete/'+rowData.id+'/'+rowData.nama_lengkap+'" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Hapus</a>';
                    output == '</div>';
                }
                $(td).html(output);
            }
        }
    ],
    'columnDefs': [
        {
            "targets": [0,1,2,3,5,6],
            "className": "text-center",
        }
    ]
});

// number table
table.on( 'order.dt search.dt', function () {
    table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
}).draw();

$(document).on('click', '.add', function(e){
    e.preventDefault();
    $('#modal-add').modal('show');
})

$(document).on('click', '.ubah', function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.post(base_url+'/users/get_data', {id : id}, function(res){
        $('#modal-ubah').find('#id_user').val(id);
        $('#modal-ubah').find('#nama_lengkap').val(res.nama_lengkap);
        $('#modal-ubah').modal('show');
    }, 'json')
})

$(document).on('click', '.edit', function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.post(base_url+'/users/get_data', {id : id}, function(res){
        $('#modal-edit').find('#id_user').val(id);
        $('#modal-edit').find('#nama_lengkap').val(res.nama_lengkap);
        $('#modal-edit').find('#email').val(res.email);
        $('#modal-edit').find('#no_telp').val(res.no_telp);
        $('#modal-edit').find('#alamat').val(res.alamat);
        $('#modal-edit').find('#image_old').val(res.foto);
        $('#modal-edit').find('#id_group').val(res.id_group).change();
        $('#modal-edit').modal('show');
    }, 'json')
})

$(document).on('click', '.delete', function(e){
    e.preventDefault();
    var url = $(this).attr('href');
    
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Ingin Menghapus Akun Bank ini.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya Hapus!',
        cancelButtonText: 'Batal'
        }).then((result) => {
        if (result.isConfirmed) {
            location.href = url;
        }
    })
})