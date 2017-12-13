<?include('header.php')?>


        <div class="col-sm-7">

    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left" style="margin-left: 19px;">
            <div class="panel-body">



<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
              <h6 class="w3-opacity">Start a Discussion</h6>
              <textarea class="form-control" name="content" contenteditable="true" rows="4" cols="50"  style="outline: none; -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none; background-color: #fcfcfc;" >Start a Discussion...</textarea>


 <hr class='w3-clear'>
              <button type="submit" class="btn btn-default"><i class="fa fa-pencil"></i>  Post</button> 
 
</form>





            </div>
          </div>
        </div>
      </div>






<div class="w3-col m3" style="width:500px;">





<?php include('posts.php');?>

</div>


      <div class="w3-col m12 medias" style="width:300px; margin-top:20px; margin-left: 260px;">
      
        <? include('trend.php');?>
        
</div>


    

 </div>

</body>
</html>