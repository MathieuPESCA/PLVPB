$(function(){

  $(".btn-modifier").click(function(){
    $(".tinymce").toggle();
  });

// ACTIVITES

  $("#title-sports").click(function(){
    if($("#sports").css("display") == "none"){
      $("#sports").css("display","flex");
    }else{
      $("#sports").css("display","none");
    }
  });

  $("#title-arts").click(function(){
    if($("#arts").css("display") == "none"){
      $("#arts").css("display","flex");
    }else{
      $("#arts").css("display","none");
    }
  });

  $("#title-danses").click(function(){
    if($("#danses").css("display") == "none"){
      $("#danses").css("display","flex");
    }else{
      $("#danses").css("display","none");
    }
  });

  $("#title-musiques").click(function(){
    if($("#musiques").css("display") == "none"){
      $("#musiques").css("display","flex");
    }else{
      $("#musiques").css("display","none");
    }
  });

// CAROUSEL

  var i = 1;

  function carouselPartner(){
    var items = $(".partner-item");
    var activeItem = $(".partner-item.active");

    if(i >= items.length){
      activeItem.removeClass("active");
      items.first().addClass("active");
      i = 1;
    }else{
      activeItem.removeClass("active");
      activeItem.next().addClass("active");
      i++;
    }
  }
  var timer = setInterval(carouselPartner,2000);

//

  var x = 1;

  function carousel(){
    var items = $(".item");
    var activeItem = $(".item.active");

    if(x >= items.length){
      activeItem.removeClass("active");
      items.first().addClass("active");
      x = 1;
    }else{
      activeItem.removeClass("active");
      activeItem.next().addClass("active");
      x++;
    }
  }
  var timer = setInterval(carousel,3000);



});
