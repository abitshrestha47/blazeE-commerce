$(document).ready(function(){
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': token
        }
     });
    $('#status').change(function(){
        var status=$(this).val();
        var orderid=$(this).closest('tr').find('.id').text();
        $.ajax({
            type:'post',
            url:'/sendstatus',
            data:{
                status:status,
                orderid:orderid
            },
            success:function(){
                console.log('sent status');
            }
        });
    });
});