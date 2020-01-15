let x=0;
  let time =1000 ;
  let img =[x];
  img[0]='imges/ph21.jpg';
  img[1]='imges/ph22.jpg';
  img[2]='imges/ph23.jpg';
  img[3]='imges/ph24.jpg';
  img[4]='imges/ph25.jpg';
  img[4]='imges/ph26.jpg';
  function changeImg(){
    document.slide.src=img[x];
    if(x<img.length-1){
      x++;
    }else{
     x=0;
    }
    setTimeout("changeImg()",time);
  }


 window.onload = changeImg;

/************************Timer************************************** */
 
var myVar = setInterval(myTimer , 1000);
function myTimer(){
    var d = new Date();
    var t = d.toLocaleTimeString();
    document.getElementById("Demo").innerHTML = t;
}

/***************************Validation********************************************** */
