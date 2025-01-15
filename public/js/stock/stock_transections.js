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
    ajax: serverUrl + "/stock/pageTransection/" + searchParams_[1],
    columns: [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        },
      },
      {
        data: null,
        render: function (data, type, row, meta) {
          return (
            "<font >" +
            data["name_product"] +
            " (" +
            data["stock_unit"] +
            ")</font>"
          );
        },
      },
      {
        data: "begin",
      },
      {
        data: "add",
      },
      {
        data: "sold",
      },
      {
        data: "adjust",
      },
      {
        data: "withdraw",
      },
      {
        data: "return",
      },
      {
        data: "balance",
      },
      {
        data: null,
        render: function (data, type, row, meta) {
          var date_stock = new Date(data["created_at"]);
          const options = { dateStyle: 'short' };
          const date = date_stock.toLocaleString('en', options);
          return "<font >" + date + "</font>";
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
