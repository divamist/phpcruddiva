function fn_save(){
  var email = $("#email").val();
  var pass  = $("#psw").val();
  var passr = $("#pswr").val();
  if(email=='')
  {
    alert("Please fill your Email");
    return false
  }
  var dataval= "email="+email+"&pass="+pass+"&passr="+passr+"&op=save";
  alert(dataval);
  $.ajax({
    url:'store.php',
    method:'POST',
    data:dataval,
    success:function(data)
    {
      alert(data);
      if(data=='saved')
      {
        alert("Welcome");
        }
        if(data==saved)
        {
          alert("Welcome2");
          fn_show();
          }
    }
    })
}

function fn_show(){
  alert("testing");
  var dataval="email="+'email'+"&op=show";
  //var dataval= "email="+email+"&pass="+pass+"&passr="+passr+"&op=save";
  alert(dataval);
  $.ajax({
    url:'store.php',
    method:'POST',
    data:dataval,
    success:function(data)
    {
      $("#show").html(data);
    }
})
}

function fn_edit(id){
  alert(id);
  var dataval="id="+'id'+"&op=show";
  //var dataval="id="+'id'+"&op=edit";
  $.ajax({
    url:'store.php',
    method:'POST',
    data:dataval,
    success:function(data)
    {
        window.location ="http://localhost/1aphp/edit.php?id="+id;
      }
  })
  }

function fn_update(id){
   var email = $("#email").val();
   var dataval= "email="+email+"&id="+id+"&op=update";
   alert("up:"+dataval);
   $.ajax({
     url:'store.php',
     method:'POST',
     data:dataval,
     success:function(data)
    {
      alert("sucess");
    }
  })
}
