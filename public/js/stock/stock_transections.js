(function ($) {
    let searchParams = window.location.pathname;
    var searchParams_ = searchParams.split("/stock/listTransection/");
    $("#stockTableTransection").DataTable().clear().destroy();
    $("#stockTableTransection").DataTable({
      language: {
        search: "<i class='ti-search'></i>",
        searchPlaceholder: "ค้นหา",
        paginate: {
          next: "<i class='ti-arrow-right'></i>",
          previous: "<i class='ti-arrow-left'></i>",
        },
      },
      order: [],
      data: JSON.parse(localStorage.productsOld),
      columns: [
        {
          data: null,
          render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          },
        },
        {
          data: "name",
        },
        {
          data: "group_id",
        },
        {
          data: "pcs",
        },
        {
          data: "MIN",
        },
        {
          data: "price",
        },
        {
          data: "updated_at",
        },
        {
          data: null,
          render: function (data, type, row, meta) {
            return '<a href="#" >View Transaction</a>';
          },
        },
      ],
      columnDefs: [
        {
          targets: 6,
          className: "text-center",
        },
      ],
      responsive: true,
      searching: true,
      info: true,
      paging: true,
      pagingType: "full_numbers",
      pageLength: 10,
      lengthMenu: [
        [10, 20, 50, 100, -1],
        [10, 20, 50, 100, "All"],
      ],
      // Initial no order.
    });
})(jQuery);
