$('#table_fomular_item tbody').on('click', 'tr td', function (e) {
    var column = table.column( this );
    console.log(column.index())
  });