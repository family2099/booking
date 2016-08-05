<?php

var_dump($_POST);


?>


<!DOCTYPE>
<html>

<head>
	<meta charset="utf-8">
	<!---PS:其他js檔都要放JQUERY後面要不其他js檔先執行會錯誤--->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="/act/views/js/jquery.js"></script>
	<link href="/act/views/css/bootstrap.min.css" rel="stylesheet">
	<script src="/act/views/js/bootstrap.min.js"></script>
	
	<script>
	    
	   // $(document).ready(function()
	   // {
              
    //             $.ajax({
    //                 url: '/act/act_member/check_member',
    //                 type: 'POST',
    //                 data: {
    //                   "member_number": $('#member_number').val(),
    //                   "member_name": $('#member_name').val()
    //                 },
    //                 error:function(xml, ajaxOptions, thrownError){ 
    // 					alert(xml.status); 
    //         			alert(thrownError); 
    //         		},
    //         		async: false,
    //         		success: function(data) {
            		    
    //         		    dec=data;
    //         		  //  if(data==0)
    //         		  //  {
            		       
    //         		 	//     alert("您輸入的資料是否錯誤或您沒權限");
            		
            		        
    //         		  //  }   
    //         		}
        		    
			
    //     });
	    
	    
	    
	    
	    
	    
	    
	    function check_member()
	    {              
            var dec;
            // var member_number =document.getElementById("member_number").value;
            // var member_name =document.getElementById("member_name").value;
            
            $(document).ready(function()
            {
              
                $.ajax({
                    url: '/act/act_member/check_member',
                    type: 'POST',
                    data: {
                      "member_number": $('#member_number').val(),
                      "member_name": $('#member_name').val()
                    },
                    error:function(xml, ajaxOptions, thrownError){ 
    					alert(xml.status); 
            			alert(thrownError); 
            		},
            		async: false,
            		success: function(data) {
            		    
            		    dec=data;
            		  //  if(data==0)
            		  //  {
            		       
            		 	//     alert("您輸入的資料是否錯誤或您沒權限");
            		
            		        
            		  //  }   
            		}
        		    
			
                });

            });
            
            if(dec==0)
            {
                alert("您輸入的資料是否錯誤或您沒權限");
                return false;
                
            }
            
        }
	
	</script>
	
 
</head>

<body>
    
    <div class="row">
        <div class="col-xm-12 col-sm-10 col-sm-offset-1 col-md-9 col-md-offset-1 col-lg-8 col-lg-offset-2">

                <div class="panel panel-info">
                      
                        <div class="panel-heading">
                            <div class="page-header">
                                <center><h1><?php echo $data[3];?>活動報名</h1><center>
                            </div>
                              
                        </div>
                        
                        
                        <div>
                            <form role="form" method="post" onsubmit="return check_member();" action="/act/act_member/insert_member">
                                
                                <div class="form-group">
                                    <label>員工編號</label>
                                    <input type="text" class="form-control" name="member_number" id="member_number" placeholder="輸入活動名稱" required>
                                </div>
                                <div class="form-group">
                                    <label>員工名稱</label>
                                    <input type="text" class="form-control" name="member_name" id="member_name" placeholder="輸入活動名稱" required>
                                </div>
                        <?php 
                        
                            if($data[2]==1)
                            {
                            
                        ?>
                                <div class="form-group">
                                    <label>攜帶人數</label>
                                    <input type="number" class="form-control" name="people_number" min="0">
                                </div>
                        <?php 
                        
                            }
                            
                        ?>        
                                <div class="form-group">
                                    <label>剩餘人數:<?php echo $data[1];?>人</label>
                                    
                                </div>
                                
                                <input type="hidden" name="act_number" value="<?php echo $data[0];?>">
                                <button type="submit" class="btn btn-default" name="btnOK" >送出</button>
           
                            </form>
                                    
                            
                            
                            
                        </div>    
                                  
                          
                      
                      
                </div>
        </div>        
    </div>
    
</body>

</html>