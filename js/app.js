const btnOpen = document.getElementById('myBtnOpen');
const modal= document.getElementById('myModal');
const btnClose = document.getElementById('myBtnClose');


  btnOpen.onclick = function() {    
    modal.style.display = "block";
   
  }

  btnClose.onclick = function() {
    modal.style.display = "none";
  }