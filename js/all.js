function openForm() {
    document.getElementById("myForm").style.display = "block";
     document.getElementsByClassName('backdrop')[0].style.display = 'none';

}
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
    document.getElementsByClassName('backdrop')[0].style.display = 'flex';
  }
  
  setTimeout(openSuccess, 3000)
  function openSuccess() {
      document.getElementById("successMessage").style.display = "none";
  }



 