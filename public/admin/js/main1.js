$(document).ready(function(){
    $(document).on('input','.search1',function(){
        var searchItem=$(this).val();
        var view=$('.view').val();
        // alert(view);
        // alert(searchItem);
        if(view=='category'){
            url='/searchthis/category';
        }
        else if(view=='products'){
            url='/searchthis/products';
        }
        $.ajax({
            type:'GET',
            url:url,
            dataType:'html',
            data:{
                searchItem:searchItem,
                view:view,
            },
            success:function(data){
                $('#filter').html(data);
            }
        });
    });
    $('.m').click(function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': token
            }
         });
        $.ajax({
            type:'post',
            url:'/makeone',
        });
    });
});