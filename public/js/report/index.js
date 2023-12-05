function reload() {
    // location.reload()
}

$(document).ready(function() {

    let $selectQueryType = $('#query-type')
    
    $selectQueryType.on('change', function() {

        let $me = $(this)

        $url =  window.serverUrl + 'report/' + $me.val()

        window.location.href = $url
    })
})
