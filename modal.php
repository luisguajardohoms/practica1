<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Ventana modal</title>
<style>
button{
    background-color: aqua;
    border: 0;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0,0,0,0);
    color:aliceblue;
    font-size: 14px;
    padding: 10px 25px;
}
.modal{
    
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    background-color: rgba(0,0,0,0.3);
    align-items: center;
    justify-content: center;     
    
    top: 0;
    left: 0;
    height: 100vh;
    width: 100vw;

}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}
.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

</style>

</head>
<body>

<h2>Modal Example</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>

<script>
    // Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// When the user clicks the button, open the modal 
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

</script>
</body>
</html>