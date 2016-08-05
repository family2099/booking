<?php
// var_dump($_POST);
// echo count($_POST['employee']);
?>




<!DOCTYPE>
<html>

<head>
	<meta charset="utf-8">
	<!---PS:其他js檔都要放JQUERY後面要不其他js檔先執行會錯誤--->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../views/js/jquery.js"></script>
	<link href="../views/css/bootstrap.min.css" rel="stylesheet">
	<script src="../views/js/bootstrap.min.js"></script>
	
	<script>
	    
	    function check_time()
	    {              
            
            var startTime=document.getElementById("start_time").value;
            var endTime=document.getElementById("end_time").value;
           
            if(startTime>endTime){   
                alert("結束日期不能小於開始日期");     
                return false;     
            }     
      
        }
        function deltxt(id)
        {
            $("#div"+id).remove();
        }
        var txtId = 1;
        $(document).ready(function () {
            $("#btn").click(function () {
                
                $("#showBlock").append('<div id="div' + txtId + '">人員編號:<input type="text" name="employee[]" required/> 員工名稱:<input type="text" name="employee_name[]" required/><input type="button" value="del" onclick="deltxt('+txtId+')"></div>');
                txtId++;
            });
                
        });
	    
	</script>
    
</head>

<body>
    
    <div class="row">
        <div class="col-xm-12 col-sm-10 col-sm-offset-1 col-md-9 col-md-offset-1 col-lg-8 col-lg-offset-2">

                <div class="panel panel-info">
                      
                        <div class="panel-heading">
                            <div class="page-header">
                                <center><h1>活動新增</h1><center>
                            </div>
                              
                        </div>



                        <div>
                            
                            <form role="form" method="post" onsubmit="return check_time()" action="/act/Index/insert_act">
                                <div class="form-group">
                                    <label>活動名稱</label>
                                    <input type="text" class="form-control" name="act_name" placeholder="輸入活動名稱" required >
                                </div>
                                
                                <div class="form-group">
                                    <label>活動建立人</label>
                                    <input type="text" class="form-control" name="act_username" placeholder="輸入活動名稱" required >
                                </div>
                                
                                <div class="form-group">
                                    <label for="input2">人數限制</label>
                                    <input type="number" class="form-control" name="people_limit" min="0" required >
                                </div>
                                
                                <div class="form-group">
                                    <label>是否可攜伴</label>
                                    <input type="radio" name="partner" value="1">可攜伴
                                    <input type="radio" name="partner" value="2">不可攜伴
                                </div>
                                
                                
                                <div class="form-group">
                                    <label>開始報名與截止日期時間</label>
                                    <input name="start_time" id="start_time" type="date" required/>到
                                    <input name="end_time" id="end_time" type="date" required/>
                                </div>
                                
                                <div class="form-group">
                                    <label>可報名人員清單</label>
                                </div>
                                
                                <div id="showBlock">
                                
                                </div>
                                
                                <div>
                            
                                    <input type="button" id="btn" value="新增人員" />
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-default" name="btnOK" id="btnOK">送出</button>
                            </form>

                        </div>    
                  
                </div>
        </div>        
    </div>

</body>
</html>