$(function(){
  var xhr;
  
  $(".js-start").on("click", function(){
    if (xhr) xhr.abort();
    xhr = $.ajax({
      type: 'GET',
      url: 'ajax.php',
      dataType: 'text',
      timeout: 10000
    })
    .done(function(d){
      console.log(d);
    })
    .fail(function(){
      console.log("fail");
    })
    .always(function(){
      console.log("always");
    });
    return false;
  });

  $(".js-stop").on("click", function(){
     if (xhr) xhr.abort();
    return false;
  });  
});
