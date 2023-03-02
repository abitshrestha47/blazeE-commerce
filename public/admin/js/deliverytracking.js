$(document).ready(function(){
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': token
        }
     });
    $('.status').change(function(){
        var status=$(this).val();
        var trackid=$(this).closest('tr').find('.id').text();
        alert(trackid);
        $.ajax({
            type:'post',
            url:'/sendstatus',
            data:{
                status:status,
                trackid:trackid
            },
            success:function(){
            }
        });
    });
    $('.viewing').click(function(){
        var id=$(this).closest('tr').find('.id').text();
        alert(id);
        $.ajax({
            type:'GET',
            url:'/gettrackproducts',
            data:{
                id:id,
            },
            success:function(products){
                console.log(products);
                var table=document.querySelector('.trackproducts');
                table.innerHTML="";
                let row=table.insertRow();
                
                let cell1=row.insertCell();
                cell1.innerHTML="SNO.";

                let cell2=row.insertCell();
                cell2.innerHTML="Name";

                let cell3=row.insertCell();
                cell3.innerHTML="Quantity";

                let cell4=row.insertCell();
                cell4.innerHTML="Price";

                for(let key in products){
                    let row=table.insertRow();

                    let cell1=row.insertCell();
                    cell1.innerHTML=products[key].id;

                    let cell2=row.insertCell();
                    cell2.innerHTML=products[key].name;

                    let cell3=row.insertCell();
                    cell3.innerHTML=products[key].qty;
                    
                    let cell4=row.insertCell();
                    cell4.innerHTML=products[key].price;

                    let imageUrl = window.assetUrl + '/' + products[key].img;
                    let cell5 = row.insertCell();
                    let img = document.createElement('img');
                    img.src = imageUrl;
                    img.width = 100;
                    cell5.appendChild(img);
                }
            }
        });
    });
});