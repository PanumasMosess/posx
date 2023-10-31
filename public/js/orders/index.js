function reload() {
    location.reload()
}

$(document).ready(function() {

    let $stockTabContent = $('#stockTabContent')

    $('a[data-bs-toggle="tab"]')
        .on('shown.bs.tab', function (e) {

            let $tab = e.target

            switch ($($tab).attr('id')) {
                case 'order-dashboard-tab':
                    TAB_DASHBOARD.fetData()
                    break

                case 'order-activity-tab':
                    TAB_ACTIVITY.getActivity()
                    break
            }
        })

    /***************************
     *
     * TAB DASHBOARD
     *
     **************************/

    let $orderDashboard                 = $('#orderDashboard'),
        $orderDashboardMode             = $($orderDashboard.find('#orderDashboardMode')),
        $orderDashboardMenuViewSummary  = $($orderDashboard.find('#orderDashboardMenuViewSummary')),
        $orderDashboardMenuViewLive     = $($orderDashboard.find('#orderDashboardMenuViewLive'))

    let $orderDashboardFilter           = $($orderDashboard.find('#orderDashboardFilter'))

    let $dashboardSummary1              = $($orderDashboard.find('#dashboard-summary-1')),
        $dashboardSummary2              = $($orderDashboard.find('#dashboard-summary-2')),
        $dashboardSummary3              = $($orderDashboard.find('#dashboard-summary-3')),
        $dashboardSummary4              = $($orderDashboard.find('#dashboard-summary-4')),
        $dashboardSummary5              = $($orderDashboard.find('#dashboard-summary-5'))

    let $orderDetailModal               = $('#orderDetailModal')
    
    const TAB_DASHBOARD = {

        getCounterReceipt(viewType) {

            $.ajax({
                type: "GET",
                url: `${serverUrl}/order/view/${viewType}`
            }).done(function (res) {

                if (res.success) {
                    let $data = res.data
                    
                    $btnReceipt = $orderDashboardFilter.find(`[data-title='Receipt']`)
                    $btnReceipt.html('Receipt ' + $data.receipt.length + ' bills.')

                    $btnVoidReceipt = $orderDashboardFilter.find(`[data-title='Voided Receipt']`)
                    $btnVoidReceipt.html('Voided Receipt ' + $data.voidReceipt.length + ' bills.')
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

        getReceipt() {
            
            $btnActive = $orderDashboardFilter.find('button.active')

            $data = 'Receipt'

            if ($btnActive) $data = $btnActive.data('title')

            TAB_DASHBOARD.getDataDashboard($data)
        },

        getDataDashboard(type = null) {

            let dataObj = {
                type: type
            }
            
            console.log(dataObj)

            $.ajax({
                type: "POST",
                url: `${serverUrl}/order/getDataDashboard`,
                data: JSON.stringify(dataObj),
                contentType: "application/json; charset=utf-8"
            }).done(function (res) {

                if (res.success) {

                    let data = res.data

                    $($dashboardSummary2.find('.QA_table')).html(data.html)
                } 
                
                else {

                    swal({
                        title: 'ระบบขัดข้อง กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ',
                        text: 'Redirecting...',
                        icon: 'warning',
                        timer: 2000,
                        buttons: false
                    })

                    // reload()
                }
            }).fail(function () {

                swal({
                    title: 'ระบบขัดข้อง กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ',
                    text: 'Redirecting...',
                    icon: 'warning',
                    timer: 2000,
                    buttons: false
                })

                // reload()
            })
        },

        config() {

             /***************************
             *
             * จัดการ Event
             *
             **************************/

            $orderDashboard
                // เลือก View
                .on('change', '#View', function() {
                    let $me = $(this)

                    switch($me.val()) {
                        case 'Bills':
                            $('#dashboard-summary-1').show()
                            $('#dashboard-summary-2').show()
                            $('#dashboard-summary-3').hide()
                            $('#dashboard-summary-4').hide()
                            $('#dashboard-summary-5').hide()

                            TAB_DASHBOARD.getCounterReceipt('Bills')
                            TAB_DASHBOARD.getReceipt()

                            break

                        case 'Detail':
                            $('#dashboard-summary-1').show()
                            $('#dashboard-summary-2').hide()
                            $('#dashboard-summary-3').show()
                            $('#dashboard-summary-4').show()
                            $('#dashboard-summary-5').show()
                            break
                    }
                })
                // เลือก Shift
                // .on('change', '#Shift', function() {
                //     let $me = $(this)
                //     console.log($me.val())
                // })
                // ออกจากโหมด Terminal
                .on('click', '.outTerminal', function() {
                    let $me = $(this)
                    console.log('ออกจากโหมด Terminal')
                })
                // Reload
                .on('click', '.reload', function() {
                    let $me = $(this)
                    TAB_DASHBOARD.fetData()
                })


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

                    $orderDashboardFilter.find('button').removeClass('active')
                    $me.addClass('active')

                    switch($me.data('title')) {

                        case 'Receipt':
                            $orderDashboard.find('h4').html('Receipt')
                            TAB_DASHBOARD.getDataDashboard($me.data('title'))
                            break

                        case 'Voided Receipt':
                            $orderDashboard.find('h4').html('Voided Receipt')
                            TAB_DASHBOARD.getDataDashboard($me.data('title'))
                            break

                        // case 'Unsync':
                        //     $orderDashboard.find('h4').html('Unsync')
                        //     break
                    }
                })

            $dashboardSummary2
                .on('click', '.btnLookupOrderDetail', function() {

                    let $me = $(this)

                    let orderCode = $me.data('order-code')

                    $.ajax({
                        type: "GET",
                        url: `${serverUrl}/order/orderDetail/${orderCode}`
                    }).done(function (res) {
        
                        if (res.success) {
                            let $data = res.data
                            $('#exampleModalLongTitle').html('ODER ID: #' + $data.order_code)
                            $orderDetailModal.find('.modal-body').html($data.html)
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
                })
                .on('click', '.btnLookupOrderVoide', function() {

                    let swalConfig = {},
                        order = {},
                        dataObj = {}

                    
                    let $me = $(this),
                    $orderCustomerCode = $me.data('order-customer-code'),
                    $status = $me.data('status')

                    order = {
                        orderCustomerCode: $orderCustomerCode,
                        status: $status,
                    }

                    $me.attr('disabled', true)

                    swalConfig.title = "คุณต้องการยกเลิกบิลนี้"
                    swalConfig.text = "กรุณาระบุเหตุผล"
                    swalConfig.icon = "warning"
                    swalConfig.buttons = ['ยกเลิก', 'ตกลง']
                    swalConfig.dangerMode = true
                    swalConfig.content = "input"

                    swal(swalConfig)
                        .then(async (willDelete) => {
    
                            // ยืนยัน
                            if (willDelete != null) {

                                order.description = willDelete
        
                                dataObj = { order: order }
        
                                $.ajax({
                                    type: "POST",
                                    url: `${serverUrl}/order/update-status`,
                                    data: JSON.stringify(dataObj),
                                    contentType: "application/json; charset=utf-8"
                                }).done(function (res) {
                                    if (res.success) {
                                        swal({
                                            title: 'อัพเดทสำเร็จ',
                                            icon: 'success',
                                            button: 'Great!',
                                            timer: 2000
                                        })
            
                                    } else {
                                        swal({
                                            title: res.messages,
                                            text: 'Redirecting...',
                                            icon: 'warning',
                                            timer: 2000,
                                            buttons: false
                                        })
            
                                        reload()
                                    }
                                }).fail(function (err) {
                                    const message = err.responseJSON?.messages || 'ไม่สามารถอัพเดทได้ กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ';
                                    swal({
                                        title: message,
                                        text: 'Redirecting...',
                                        icon: 'warning',
                                        timer: 2000,
                                        buttons: false
                                    })
            
                                    // $dataTableInCompleted.ajax.reload()
                                    // $dataTableCompleted.ajax.reload()
            
                                })

                            } 
                            
                            else {
                                $me.attr('disabled', false)
                            }
                        })
                })

            $dashboardSummary3
                .on('click', 'button', function() {

                    let $me = $(this),
                        $title = $me.data('title')

                    // switch($title) {

                    //     case 'Type':
                    //         console.log('Type')
                    //         break

                    //     case 'Group':
                    //         console.log('Group')
                    //         break
                    // }

                    $dashboardSummary3.find('.QA_table').html('LOADING . . .')

                    dataObj = { title: $title }
        
                    $.ajax({
                        type: "POST",
                        url: `${serverUrl}/order/orderDashboard/detail`,
                        data: JSON.stringify(dataObj),
                        contentType: "application/json; charset=utf-8"
                    }).done(function (res) {
                        if (res.success) {
                            $dashboardSummary3.find('.QA_table').html(res.data.html)
                        } else {

                            swal({
                                title: res.messages,
                                text: 'Redirecting...',
                                icon: 'warning',
                                timer: 2000,
                                buttons: false
                            })

                            reload()
                        }
                    }).fail(function (err) {
                        const message = err.responseJSON?.messages || 'ไม่สามารถอัพเดทได้ กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ';
                        swal({
                            title: message,
                            text: 'Redirecting...',
                            icon: 'warning',
                            timer: 2000,
                            buttons: false
                        })

                        // $dataTableInCompleted.ajax.reload()
                        // $dataTableCompleted.ajax.reload()

                    })
                })

            $dashboardSummary4
                .on('click', 'button', function() {

                    let $me = $(this)

                    // switch($me.data('title')) {

                    //     case 'Sales':
                    //         console.log('Sales')
                    //         break

                    //     case 'Qty':
                    //         console.log('Qty')
                    //         break

                    //     case 'Group':
                    //         console.log('Group')
                    //         break
                    // }

                    $dashboardSummary4.find('.QA_table').html('LOADING . . .')

                    dataObj = { title: $title }
        
                    $.ajax({
                        type: "POST",
                        url: `${serverUrl}/order/orderDashboard/bestSellers`,
                        data: JSON.stringify(dataObj),
                        contentType: "application/json; charset=utf-8"
                    }).done(function (res) {
                        if (res.success) {
                            $dashboardSummary4.find('.QA_table').html(res.data.html)
                        } else {

                            swal({
                                title: res.messages,
                                text: 'Redirecting...',
                                icon: 'warning',
                                timer: 2000,
                                buttons: false
                            })

                            reload()
                        }
                    }).fail(function (err) {
                        const message = err.responseJSON?.messages || 'ไม่สามารถอัพเดทได้ กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ';
                        swal({
                            title: message,
                            text: 'Redirecting...',
                            icon: 'warning',
                            timer: 2000,
                            buttons: false
                        })

                        // $dataTableInCompleted.ajax.reload()
                        // $dataTableCompleted.ajax.reload()

                    })
                })

            $dashboardSummary5
                .on('click', 'button', function() {

                    let $me = $(this)

                    // switch($me.data('title')) {

                    //     case 'Reload':
                    //         console.log('Reload')
                    //         break
                    // }

                    
                    $dashboardSummary5.find('.QA_table').html('LOADING . . .')
        
                    $.ajax({
                        type: "POST",
                        url: `${serverUrl}/order/orderDashboard/voidItems`,
                        contentType: "application/json; charset=utf-8"
                    }).done(function (res) {
                        if (res.success) {
                            $dashboardSummary5.find('.QA_table').html(res.data.html)
                        } else {

                            swal({
                                title: res.messages,
                                text: 'Redirecting...',
                                icon: 'warning',
                                timer: 2000,
                                buttons: false
                            })

                            reload()
                        }
                    }).fail(function (err) {
                        const message = err.responseJSON?.messages || 'ไม่สามารถอัพเดทได้ กรุณาลองใหม่อีกครั้ง หรือติดต่อผู้ให้บริการ';
                        swal({
                            title: message,
                            text: 'Redirecting...',
                            icon: 'warning',
                            timer: 2000,
                            buttons: false
                        })

                        // $dataTableInCompleted.ajax.reload()
                        // $dataTableCompleted.ajax.reload()

                    })
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

        fetData() {

            TAB_DASHBOARD.getSummary()
            TAB_DASHBOARD.getLiveData()

            if ($("#View option:selected").val() == 'Bills') {
                TAB_DASHBOARD.getCounterReceipt('Bills')
                TAB_DASHBOARD.getReceipt()
                $('#dashboard-summary-1').show()
                $('#dashboard-summary-2').show()
                $('#dashboard-summary-3').hide()
                $('#dashboard-summary-4').hide()
                $('#dashboard-summary-5').hide()
            }

            else {

            }
        },

        init() {
            TAB_DASHBOARD.config()
            TAB_DASHBOARD.getSummary()
                        
            // TODO:: Refactor 
            // เดิมคือใช้ AJAX LOOP ทุก 5วิในการดึงข้อมูล
            // เปลี่ยนเป็น เมื่อมีการเปลี่ยนแปลง DB ให้ใช้ phuser ยิงเข้ามา เพื่อดึงข้อมูลแทน

            setInterval(function() {
                TAB_DASHBOARD.fetData()
            }, 5000)
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

            $($stockTabContent.find('#order-activity'))
                .on('click', '#btnReloadActivity', function() {
                    TAB_ACTIVITY.getActivity()
                })
                .on('click', 'tr', function() {
                    let $me = $(this)

                    // TODO:: HANDLE MODAL
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
