$(document).ready(function(){
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': token
        }
     });
    $('.addnow').click(function(){
        var orderid = $(this).find('.oid').text();
        alert(orderid);
        var num=document.querySelector('.orderproducts tbody').rows.length;

        alert(num);
        var row=document.querySelector('.orderproducts tbody tr:nth-child(1)');
        var cellnum=row.cells.length;
        alert(cellnum);
        var cells=[];
        for (var i = 1; i <=num; i++) {
                for(var j=1;j<=cellnum;j++){
                    var cell=document.querySelector('.orderproducts tbody tr:nth-child('+i+') td:nth-child('+j+')');
                    cell=cell.innerHTML;
                    cells.push(cell);
                }
        }
        alert(cells);
        // var firstCell = document.querySelector('.orderproducts tbody tr:nth-child(2) td:nth-child(2)');
        // var firstCell=firstCell.innerHTML;
        // alert(firstCell);
        var oid=document.getElementsByClassName("oid")[0].textContent;
        alert(oid);
        // var lastName=document.getElementsByClassName("lastNamee")[0].textContent;
        // var address=document.getElementsByClassName("address")[0].textContent;
        // var phone=document.getElementsByClassName('phone')[0].textContent;
        // var email=document.getElementsByClassName('email')[0].textContent;
        // var order=document.getElementsByClassName('order')[0].textContent;
        // alert('fsdf');
        // $.ajax({
        //     type:"POST",
        //     url:'delivertrack',
        //     data:{
        //         firstName: firstName,
        //         lastName: lastName,
        //         address:address,
        //         phone:phone,
        //         email:email,
        //         order:order,
        //     },
        //     success:function(){
        //         console.log('fsdf');
        //     }
        // });
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
}); 