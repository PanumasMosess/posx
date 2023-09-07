$(document).ready(function() {

    /***************************
     *
     * TAB DASHBOARD
     *
     **************************/

    let $orderDashboard = $('#orderDashboard'),
        $orderDashboardMode = $($orderDashboard.find('#orderDashboardMode')),
        $orderDashboardMenuViewSummary = $($orderDashboard.find('#orderDashboardMenuViewSummary')),
        $orderDashboardMenuViewLive = $($orderDashboard.find('#orderDashboardMenuViewLive'))

    let $orderDashboardFilter = $($orderDashboard.find('#orderDashboardFilter'))

    const TAB_DASHBOARD = {

        config() {
            $orderDashboardMode
                .on('click', 'button', function() {

                    let $me = $(this)

                    switch($me.data('mode')) {

                        case 'live':

                            $me.hide()

                            $($orderDashboardMode.find("button[data-mode='paid']")).show()
                            $orderDashboardMenuViewSummary.hide()
                            $orderDashboardMenuViewLive.show()

                            $($orderDashboard.find('h3')).html('Live data')

                            TAB_DASHBOARD.getLiveData()

                            break

                        case 'paid':

                            $me.hide()

                            $($orderDashboardMode.find("button[data-mode='live']")).show()
                            $orderDashboardMenuViewSummary.show()
                            $orderDashboardMenuViewLive.hide()

                            $($orderDashboard.find('h3')).html('Summary')

                            TAB_DASHBOARD.getSummary()

                            break
                    }
                })

            $orderDashboardFilter
                .on('click', 'button', function() {

                    let $me = $(this)

                    switch($me.data('title')) {

                        case 'Receipt':
                            $orderDashboard.find('h4').html('Receipt')
                            // TODO:: HANDLE SOMETHING
                            break

                        case 'Voided Receipt':
                            $orderDashboard.find('h4').html('Voided Receipt')
                            // TODO:: HANDLE SOMETHING
                            break

                        case 'Unsync':
                            $orderDashboard.find('h4').html('Unsync')
                            // TODO:: HANDLE SOMETHING
                            break
                    }
                })
        },

        getSummary() {

            let dataObj = {
                businessMode: '1',
                from: '2023-09-07T07:00:00+07:00',
                orderBy: '2',
                period: '2',
                shift: 'All',
                to: '2023-09-08T06:59:59+07:00',
                user: ''
            }

            $.ajax({
                type: "POST",
                url: `${serverUrl}/order/sumOrderItems`,
                data: JSON.stringify(dataObj),
                contentType: "application/json; charset=utf-8"
            }).done(function (res) {

                if (res.success) {
                    let data = res.data
                    let $listSummary = $orderDashboardMenuViewSummary.find('li')

                    $listSummary.each(function(key) {
                        // TODO:: เก็บรายละเอียด
                        let $me = $(this)
                        $($me.find('.round_badge')).html(data[key])
                    })
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

        getLiveData() {

            let dataObj = {
                
            }

            $.ajax({
                type: "POST",
                url: `${serverUrl}/order/getLiveData`,
                data: JSON.stringify(dataObj),
                contentType: "application/json; charset=utf-8"
            }).done(function (res) {

                if (res.success) {
                    let data = res.data
                    let $listLive = $orderDashboardMenuViewLive.find('li')

                    $listLive.each(function(key) {
                        // TODO:: เก็บรายละเอียด
                        let $me = $(this)
                        $($me.find('.round_badge')).html(data[key])
                    })
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

        init() {
            TAB_DASHBOARD.config()
            TAB_DASHBOARD.getSummary()
        }
    }

    /***************************
     *
     * TAB TOGO
     *
     **************************/

    const TAB_TOGO = {
        init() { console.log('TAB_TOGO') }
    }

    /***************************
     *
     * TAB DELIVERY
     *
     **************************/

    const TAB_DELIVERY = {
        init() { console.log('TAB_DELIVERY') }
    }

    /***************************
     *
     * TAB ACTIVITY
     *
     **************************/

    const TAB_ACTIVITY = {

        config() {
            
            $('[data-toggle="tooltip"]').tooltip()

            let $stockTabContent = $('#stockTabContent')

            $($stockTabContent.find('#order-activity'))
                .on('click', '#btnReloadActivity', function() {
                    TAB_ACTIVITY.getActivity()
                })
                .on('click', 'tr', function() {
                    let $me = $(this)

                    // TODO:: HANDLE MODAL
                    console.log($me)
                })

            $('a[data-bs-toggle="tab"]')
                .on('shown.bs.tab', function (e) {

                    let $tab = e.target

                    if ($($tab).attr('id') == 'order-activity-tab') TAB_ACTIVITY.getActivity()

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

        init() {
            TAB_ACTIVITY.config()
        }
    }

    /***************************
     *
     * MAIN
     *
     **************************/

    const ORDER_POS = {
        init() {
            TAB_DASHBOARD.init()
            TAB_TOGO.init()
            TAB_DELIVERY.init()
            TAB_ACTIVITY.init()
        }
    }

    ORDER_POS.init()
})
