var table = $('.datatables').DataTable({
    'responsive': false,
    // 'scrollX': true,
    'processing': true,
    'serverside' : true,
    "ajax": base_url+"/log/get_data",
    "columns": [
        { "data": null },
        { "data": 'nama_lengkap' },
        { "data": 'description' },
        { "data": 'created_at' },
        // { "targets": -1,
        //     data: 'id',
        //     createdCell: function(td, cellData, rowData, row, col){
        //         var output = '';
        //         output += '<div class="btn-group">';
        //             output += '<button type="button" class="btn btn-info btn-sm"><i class="fa fa-search"></i> Edit </button>';
        //             output += '<a href="'+base_url+'customer/delete/'+rowData.id+'/'+rowData.nama_lengkap+'" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Hapus</a>';
        //         output == '</div>';
        //         $(td).html(output);
        //     }
        // }
    ],
    'columnDefs': [
        {
            "targets": [0,1,3],
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