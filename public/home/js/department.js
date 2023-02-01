$(document).ready(function() {
    $('.deptgo').click(function(){
        departmentId=$(this).val();
        window.location = "/departmentView/" + departmentId;
    });
});