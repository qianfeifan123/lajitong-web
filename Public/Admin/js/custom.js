//  Author: Louis Holladay
//  Website: AdminDesigns.com
//  Last Updated: 01/01/14 
// 
//  This file is reserved for changes made by the user 
//  as it's often a good idea to seperate your work from 
//  the theme. It makes modifications, and future theme
//  updates much easier 
// 

//  Place custom styles below this line 
///////////////////////////////////////

jQuery(document).ready(function() {
  
    // Init Theme Core    
    Core.init();
  
    $("#checkall").click(function(){
      if($(this).prop("checked")){
        $(".cbox").prop("checked", true);
      }else{
        $(".cbox").prop("checked", false);
      }
    });  
  
    $(".delall").click(function(){
      var count = $(".cbox:checked").size();
      if(count==0){
        alert("请选择要删除的行");
        return false; 
      }
  
      var sure=confirm("确认要删除吗？");
      if(sure==true){
         var arr=[];
         console.log($(".cbox input:checked"));
        $(".cbox input:checked").each(function(){   
          arr.push($(this).data('id'));                               
        });
        console.log(arr);return false;
                var url = '/Dustbin/dels';
                var id = arr;
                var data = {id : id };
                $.post(url,data,function(res){
                    if(!res.status){ 
                        layer.alert(res.message);
                    }else{ 
                        $('.cbox').each(function() {
                            if($(this).data('id')==id){
                                $(this).hide();
                            }
                            location.reload() ;
                        });
                        layer.msg('删除成功！'); 
                    }
                },'json');    
            return false;
           
      }else{

      }
    }); 
    
});
