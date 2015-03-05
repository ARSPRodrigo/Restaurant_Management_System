<!DOCTYPE HTML>
<?php

    $host = "localhost";
    $userName = "root";
    $pasword = "root";
    $database = "restaurant";

    // Create connection
    $con=mysqli_connect($host, $userName, $pasword, $database);

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $nextOrder;

    $selectMaxSql = "SELECT MAX(Order_No) FROM _order";
    
    $result = mysqli_query($con,$selectMaxSql);

    while($row = mysqli_fetch_array($result)) {
        $nextOrder = $row['MAX(Order_No)'];
    }
?>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>DAILY FOOD</title>
<!--    <link rel="stylesheet" href="styles.css">-->
    <link rel="stylesheet" href="style/all2.css">

    <script>
        
        id = 0;
        var catTr, mTr;
        catTr = 'catTr'+id;
        mTr = 'mTr'+id;

        function startTime() {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('timesp').innerHTML = h+":"+m+":"+s;
            var t = setTimeout(function(){startTime()},500);
        }

        function checkTime(i) {
            if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>
    
</head>
<body onload="startTime()">
    <div class="wrapper">
        <div class="container order-container">
            <h1 style ="font-size:70"><em>Place Order</em></h1>
            
            <div class="inner-stuff">
            
             <div class='top-line'>
            	       <div class='line-blocks'><strong>Order No: </strong><span class='placeholder'><?php  echo $nextOrder+1;?></span></div>
            	       
            	       <div class='line-blocks'><strong>Date: </strong><span class='placeholder'>
                           <?php date_default_timezone_set("Asia/Colombo"); echo date("Y/m/d"); ?></span></div>
            	       <div class='line-blocks'><strong>Time: </strong><span class='placeholder' id='timesp'></span></div>
          	       </div>
                <div class="stuff-table">
                <button class="btn-awesome btn-shayn-dark btn-shayn-thin" onclick="javascript:addItem(); javascript:setCategory(catTr);">+ Add item</button>
                     <span style="color:#999;">&mdash;</span> 
                    <button class="btn-awesome btn-shayn-dark btn-shayn-thin" onclick="javascript:delItem()" style='width:140px;'>&mdash; Remove item</button>
            
           	  <table id="orderTbl" class="table" cellspacing='0'>
            	    <tr class='strong'>
            	      <td width='200px'>Meal Category</td>
            	      <td width='250px'>Meal</td>
            	      <td width='150px'>Quantity</td>
            	      <td width='150px'>Price</td>
          	         </tr>
       	      </table>
                
                </div>
                
            <div id="message"></div>
        </div>
    </div>
        
        <script>
            
//            var trs=[];
            var tbl=document.getElementById('orderTbl');
            var id = 0;
            var catTr, mTr,sQty, sPc;
            catTr = 'catTr'+id;
            mTr = 'mTr'+id;
            sQty = 'qty'+id;
            sPc = 'pc'+id;
            //addItem();
            
            function addItem() {
                var tr=document.createElement('tr');
//                trs[trs.length||0]=tr;
                id++;
                catTr = 'catTr'+id;
                tr.innerHTML=
                        '<td id='+catTr+'>\
                            <select class=\'full-select\'>\
                                <option value=\'cat-one\'>Category One</option>\
                                <option value=\'cat-two\'>Category Two</option>\
                                <option value=\'cat-three\'>Category Three</option>\
                                <option value=\'cat-four\'>Category Four</option>\
                            </select>\
                        </td>\
                        <td id='+mTr+'>\
                            <select class=\'full-select\'>\
                                <option value=\'fd-one\'>Category One</option>\
                                <option value=\'fd-two\'>Category Two</option>\
                                <option value=\'fd-three\'>Category Three</option>\
                                <option value=\'fd-four\'>Category Four</option>\
                            </select>\
                        </td>\
                        <td><input type=\'text\' class=\'full-select\' id='+sQty+' value=\'0\' onChange=\'javascript:setPrice()\'></td>\
                        <td id='+sPc+'>\
                            <span class=\'full-select right-al\' ></span>\
                        </td>';
                tbl.appendChild(tr);
            }
            
            function delItem() {
                if (tbl.childNodes.length > 2) tbl.removeChild(tbl.lastChild);
            }

            function setCategory(str) {
              if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
              } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                  document.getElementById(str).innerHTML=xmlhttp.responseText;
                }
              }
              xmlhttp.open("get","itemSearch.php?q="+str,true);
              xmlhttp.send();
            }

            function setMeal(str1,str2) {
                str2=str2.options[str2.selectedIndex].text;
              if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
              } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                  document.getElementById(str1).innerHTML=xmlhttp.responseText;
                }
              }
              xmlhttp.open("get","mealSearch.php?m="+str1+"&n="+str2,true);
              xmlhttp.send();
            }

            function setPrice(str1,str2,str3) {

                str3=str3.options[str3.selectedIndex].text;
                str1=document.getElementById(str1).getAttribute('value');

              if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
              } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                  document.getElementById(str).innerHTML=xmlhttp.responseText;
                }
              }
              xmlhttp.open("get","setPrice.php?m="+str1+"&n="+str2+"&k="+str3,true);
              xmlhttp.send();
            }
            
        </script>
        
</body>
</html>