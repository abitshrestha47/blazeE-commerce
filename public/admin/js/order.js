$(document).ready(function(){
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': token
        }
     });
    $('.addnow').click(function(){
        var orderid=$('.oid').text();
        $.ajax({
            type:'POST',
            url:'/delivertrack',
            data:{
                orderid:orderid,
            },
            success:function(){
                console.log('fsdf');
            }
        });
    });
    $('.viewing').click(function(){
        var self = this;
        var orderid = $(this).closest('tr').find('.orderid').text();
        $.ajax({
            type: 'get',
            url: '/sendorder',
            data: {
                orderid: orderid
            },
            success: function(data){
                console.log(data.products);
            }
        });
    });
    //to accept or reject orders
    $('.tick').click(function(){
        var id=$(this).closest('td').data('id');
        var value=$(this).data('value');
        $.ajax({
            type:'POST',
            url:'/acceptreject',
            data:{
                id:id,
                value:value
            },
            success:function(){
            }
        })
    });
}); 