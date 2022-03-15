<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  function proceed2(){
    var x=document.cookie.split(";").length;
    if(x>"2"){
        if(document.getElementById('carts_total').innerHTML!="0")
          {
            document.getElementById('checkout_form').submit();
            }
        else{
           $("#myModal").modal('show');
           document.getElementById('modal-title').innerHTML="First select items in Cart before Check out";
           
        }
    }
    else{
      var pp="";
      $("#myModal").modal('show');
      document.getElementById('modal-title').innerHTML="Log In First to perform checkout";
      pp+="<form>";
        pp+='<div class="mb-3">';
          pp+='<label for="exampleInputEmail1" class="form-label">Email address</label>';
          pp+='<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">';
          pp+='<div id="emailHelp" class="form-text">We\'ll never share your email with anyone else.</div>';
          pp+='</div>';
          pp+='<div class="mb-3">';
          pp+='<label for="exampleInputPassword1" class="form-label">Password</label>';
          pp+='<input type="password" class="form-control" id="exampleInputPassword1">';
          pp+='</div>';
          pp+='<div class="mb-3 form-check">';
          pp+='<input type="checkbox" class="form-check-input" id="exampleCheck1">';
          pp+='<label class="form-check-label" for="exampleCheck1">Check me out</label>';
        pp+='</div>';
        pp+='<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$(\'#myModal\').modal(\'hide\');">Close</button>';
        pp+='<button type="submit" class="btn btn-primary">Submit</button>';
      pp+="</form>";
    
    document.getElementById('modal-body').innerHTML=pp;
    }
  }
    function cart(x,y,z,th){    
      var quantity=th.parentNode.childNodes[5].childNodes[1].innerHTML;
      if(document.getElementById('item').value=="") document.getElementById('item').value="food%%"+x+"%%../"+y+"%%"+z+"%%"+quantity;
      else document.getElementById('item').value+="^^"+"food%%"+x+"%%../"+y+"%%"+z+"%%"+quantity;    

      var carts_total=document.getElementById("carts_total");
      var total=Number(carts_total.innerHTML)+quantity*z;
      carts_total.innerHTML=total;
      th.parentNode.childNodes[5].childNodes[1].innerHTML="0";
    }

  

    function numbers(operation,th){      
    var x= th.parentNode.parentNode.childNodes;
      var y=Number(x[1].innerHTML);
    if(operation=="add"){
      y++;
      x[1].innerHTML=""+y;
    }
    else{
      if(y!=0){
        y--;     
      } x[1].innerHTML=""+y;
    }
      
    }
 </script>
 <style>
      #first{
        display: inline;
      }
      #price{
        position: fixed;
        bottom:2vh;
        right:3vw;
      }
      #price:hover{
        z-index:100000;
      }
      #carts{
        height:115px;
        width:115px;
        border-radius: 50%;
        padding-top:22px;
        padding-left:18px;
        background-color: red;
        color:white;
        font-size: 20px;
        font-weight: 600;
        position:fixed;
        right:3vw;
        bottom:5vh;
        z-index:10000;        
      }
      #carts:hover{
        cursor: pointer;
      }
    </style>
 <form action="components/check_out_multiple.php" method="post" id="checkout_form">
  <input type="hidden" name="item" id="item"> 
</form>
<div id="carts" onclick="proceed2()" onmouseout="document.getElementById('second').style.display='none';document.getElementById('first').style.display='block';" onmouseover="document.getElementById('first').style.display='none';document.getElementById('second').style.display='block';">
  <div id='first'>
    <div>Carts:</div><i class="fas fa-shopping-cart"></i>
    <span id="carts_total">
        0
    </span>
  </div>
  <div id='second' style="display:none;">
    <span>Checkout</span>
  </div>

</div>
<div id="modals">

</div>
<?php
    // if(isset($_COOKIE["logged"])&&count($_COOKIE)>2){
    //   echo '<button id="checkout" onclick="document.getElementById(\'checkout_form\').submit();">Proceed to Checkout</button>';
    // }
?>
<div id="myModal" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" onclick="$('#myModal').modal('hide');">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">

      </div>
    </div>
  </div>
</div>