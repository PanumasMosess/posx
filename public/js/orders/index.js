$(document).ready(function() {

    const ORDER = {

        config() {
            
            $('[data-toggle="tooltip"]').tooltip()

            let $stockTabContent = $('#stockTabContent')

            $($stockTabContent.find('#order-activity'))
                .on('click', '#btnReloadActivity', function() {
                    ORDER.getActivity()
                })
                .on('click', 'tr', function() {
                    let $me = $(this)

                    console.log($me)
                })
        },

        getActivity() {

            $('.custom_activity_table').hide()

            $.ajax({
                type: "GET",
                url: `${serverUrl}/order/activity`
            }).done(function (res) {

                if (res.success) {
                    let $data = res.data

                    let currentDate = new Date().toJSON().slice(0, 10);

                    $('#order-activity').find('h3').html('Activity ' + currentDate)

                    $('.custom_activity_table').fadeIn(500)
                    $('.custom_activity_table').html($data.html)
                } 
                
                else {

                    swal({
                        title: 'ระบบขัดข้อง กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ',
                        text: 'Redirecting...',
                        icon: 'warning',
                        timer: 2000,
                        buttons: false
                    })

                    reload()
                }
            }).fail(function () {

                swal({
                    title: 'ระบบขัดข้อง กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ',
                    text: 'Redirecting...',
                    icon: 'warning',
                    timer: 2000,
                    buttons: false
                })

                reload()
            })
        },

        handleTab() {

            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {

                let $tab = e.target

                switch ($($tab).attr('id')) {
                    case 'order-togo-tab':
                        // TODO:: HANDLE
                        break

                    case 'order-delivery-tab':
                        // TODO:: HANDLE
                        break

                    case 'order-activity-tab':
                        ORDER.getActivity()
                        break
                }
            
             
             });
        },

        init() {
            ORDER.config()
            ORDER.handleTab()
        }
    }

    ORDER.init()
})
