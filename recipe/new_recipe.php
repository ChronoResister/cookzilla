<html>

<head>
	<title>cookzilla</title>
  


	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

 

  <script src="../js/jquery-1.10.2.min.js"></script>
  <script src="../js/jquery.form.js"></script>
 <script type="text/javascript">


   $(document).ready(function(){
  $("input#tag").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});
  
  $('#btn').click(function(){

    $('#preview').fadeIn(400).html('<img src="../loader.gif" align="absmiddle">&nbsp;<span class="loading">sending</span>');
    
    $("#imageuploadFrom").ajaxSubmit({
      
      target: '#preview'
            
    });
    
    $('#imageuploadFrom').clearForm()
    
    
  })


});

 </script>


	<style>
		.navbar.navbar-inverse.navbar-extra{
			color: orange;
		}
.col-center-block {  
    float: none;  
    display: block;  
    margin-left: auto;  
    margin-right: auto;  
}  
#ingredient-div.inline{float:left;}
  
	</style>
</head>

<body>
<div class="navbar navbar-inverse navbar-extra" >
        <div class="container">
          <div class="navbar-header" >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/cookzilla"><font color="red">🍴Cookzilla!🍴</font></a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              


              
              <li id="subscribe">
                <a href="/cookzilla/recipe/view_recipe.php?sort=createdat"><font color="orange">Recipe</font></a>
              </li>

              
              
              <li id="subscribe">
                <a href=/cookzilla/group/group.php><font color="orange">Group</font></a>
              </li>
              
              
              
            </ul>
            
            <div class="dropdown">
            <ul id="navbar-right" class="nav navbar-nav navbar-right">
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
               <?php
				session_start();
			
				echo $_SESSION['nickname']. "(". $_SESSION['uname'].")";
				
			?>

                      <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                
                <li><a href="logout.php">Sign out</a></li>
              </ul>
              </li>
            </ul>
            </div>
</div>
</div>
</div>
 <div class="col-xs-6  col-center-block">  
  <form class="form-horizontal" onsubmit="return check()" action="add_recipe.php" method="post" name="form">
    <fieldset>
      <div id="legend" class="">
        
      </div>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Title</label>
          <div class="controls">
            <input class="form-control" type="text" name="rtitle" placeholder="title of recipe" >
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Number of Serving</label>
          <div class="controls">
            <input type="number" placeholder="estimated number of serving" name ="nos" class="form-control">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Prepended text-->
          
          <label class="control-label">Tag</label>
    
          <div class="inline controls" >
            <input type="text" name="tags[]" placeholder="tag" id="tag"><input type="button" value="Add" onclick="TagAddOrRemove(this)">
            <!--<div class="col-xs-6 inline " id="input_tag">  
            <input class="form-control" placeholder="tag"  type="text" >
            </div>
            
            <input type="button" class="btn btn-success" id="addTag" onclick="add(this)" value ="Add">
            <p class="help-block"></p>-->
          </div>
          
        </div>

    <div class="control-group">

          <!-- Prepended text-->
          
          <label class="control-label">Ingredient</label>
    
          <div class="inline controls" >
            <input type="text" name="inames[]" placeholder="Ingredient name" id="iname">
            <input type="number" name="iqs[]" placeholder="quantity" id="iq">
            unit:
            <select class="input-xlarge" name="units[]">
            <option value ="1">piece</option>
            <option value ="2">spoon</option>
            <option value ="3">cup</option>
            <option value ="4">bowl</option>
            <option value ="5">g</option>
            <option value ="6">kg</option>
            <option value ="7">lb</option>
            <option value ="8">oz</option>
            <option value ="9">ml</option>
            <option value ="10">l</option>
            <option value ="11">pt</option>
            <option value ="12">qt</option>
            <option value ="13">gal</option>
            </select>
            <input type="button" value="Add" onclick="IngAddOrRemove(this)">
            <!--<div class="col-xs-6 inline " id="input_tag">  
            <input class="form-control" placeholder="tag"  type="text" >
            </div>
            
            <input type="button" class="btn btn-success" id="addTag" onclick="add(this)" value ="Add">
            <p class="help-block"></p>-->
          </div>
          
        </div>
    
    <div class="control-group">

          <!-- Prepended text-->
          
          <label class="control-label">Image Links</label>
    
          <div class="inline controls" >
            <input type="text" name="images[]" placeholder="link" id="tag" size="60"><input type="button" value="Add" onclick="ImgAddOrRemove(this)">
            <!--<div class="col-xs-6 inline " id="input_tag">  
            <input class="form-control" placeholder="tag"  type="text" >
            </div>
            
            <input type="button" class="btn btn-success" id="addTag" onclick="add(this)" value ="Add">
            <p class="help-block"></p>-->
          </div>
          
        </div>

    <div class="control-group">

          <!-- Textarea -->
          <label class="control-label">Desciption</label>
          <div class="controls">
            <div class="textarea" >
                  <textarea name ="descrip" type="" class="form-control" rows="20"> </textarea>
            </div>
            
            
            
         
        </div>
    </div>
    

    

    <div class="control-group">
        <button type="submit" class="btn center-block">Submit</button>
    </div>
    </fieldset>
  </form>
  <div class="control-group">

          <!-- Textarea -->
          
    </div>
  <div class="control-group">
          <label class="control-label">Images Preview(copy the link into image links)</label>
          <div class="controls">
            <div id = "preview">
                  
            </div>
            
            
            
         
        </div>
          <!-- Textarea -->
          <form action="../imgupload.php" method="post" enctype="multipart/form-data" id="imageuploadFrom" class="inline">

<input name="image" type="file" class="image"><br/>

<input type="button" value="upload" id="btn" class="btn">

</form>
    </div>
</div>

            </body>

<script type="text/javascript">
function check()
{
if(document.form.rtitle.value.length==0){
  alert("Recipe title cannot be null!");
  document.form.rtitle.focus();
  return false;
  }
}


Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
};


    var img_cnt = 0;
    var added_tag = [];
    var added_in = [];

    function IngAddOrRemove(btn) {
        var add = btn.value == "Add";
        var div = btn.parentNode, list = div.parentNode;
        //console.log(document.getElementById('tag').value);
        
        
        if (add) {
           var txt = div.getElementsByTagName('input')[0];
           var q = div.getElementsByTagName('input')[1];
           
           if (txt.value == '' || q.value == '') {
               alert("ingredient or quantity is null!");
               return;
           }
            for (i = 0; i < added_in.length; i++) {
              if (txt.value == added_in[i]) {
                alert("duplicate Ingredient!");
                return;
              }
            }
            

            added_in.push(txt.value);
            div = div.cloneNode(true);
            var inputs = div.getElementsByTagName('input'); inputs[inputs.length - 1].value = 'Delete';
            //inputs[2].value = s.value;
            list.appendChild(div);
            txt.value ='';
            q.value = '';

        }
        else {
          list.removeChild(div);
          added_in.remove(div.getElementsByTagName('input')[0].value);
        }
          

    }

    function TagAddOrRemove(btn) {
        var add = btn.value == "Add";
        var div = btn.parentNode, list = div.parentNode;
        //console.log(document.getElementById('tag').value);
        
        
        if (add) {
           var txt = div.getElementsByTagName('input')[0];
           if (txt.value == '') {
               alert("please input tag!");
               return;
           }

            for (i = 0; i < added_tag.length; i++) {
              if (txt.value == added_tag[i]) {
                alert("duplicate tag!");
                return;
              }
            }
            

            added_tag.push(txt.value);
            div = div.cloneNode(true);
            var inputs = div.getElementsByTagName('input'); inputs[inputs.length - 1].value = 'Delete';
            list.appendChild(div);
            txt.value ='';
            

        }
        else {
          list.removeChild(div);
          added_tag.remove(div.getElementsByTagName('input')[0].value);
        }
          

    }

function ImgAddOrRemove(btn) {
  var add = btn.value == "Add";
        var div = btn.parentNode, list = div.parentNode;
        //console.log(document.getElementById('tag').value);
        
        
        if (add) {
           var txt = div.getElementsByTagName('input')[0];
           if (txt.value == '') {
               alert("please input tag!");
               return;
           }

            for (i = 0; i < added_tag.length; i++) {
              if (txt.value == added_tag[i]) {
                alert("duplicate tag!");
                return;
              }
            }
            

            added_tag.push(txt.value);
            div = div.cloneNode(true);
            var inputs = div.getElementsByTagName('input'); inputs[inputs.length - 1].value = 'Delete';
            list.appendChild(div);
            txt.value ='';
            

        }
        else {
          list.removeChild(div);
          added_tag.remove(div.getElementsByTagName('input')[0].value);
        }
}

function getCursortPosition (ctrl) {//获取光标位置函数
    var CaretPos = 0;    // IE Support
    if (document.selection) {
    ctrl.focus ();
        var Sel = document.selection.createRange ();
        Sel.moveStart ('character', -ctrl.value.length);
        CaretPos = Sel.text.length;
    }
    // Firefox support
    else if (ctrl.selectionStart || ctrl.selectionStart == '0')
        CaretPos = ctrl.selectionStart;
    return (CaretPos);
}
</script>
<script language="JavaScript" type="text/javascript" src="../ajaxfileupload.js"></script>

</html>
