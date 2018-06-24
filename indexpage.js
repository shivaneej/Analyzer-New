//initial
window.onload = function() 
{
  for (var i = 1; i <=8; i++) 
    document.getElementById('sub'+i).style.display = 'none';
}

//to display continuous improvement dropdown 
function contImp() {
    document.getElementById("cont-imp").classList.toggle('show');
}
/*window.onclick=function (e) {
    var temp=document.getElementsByClassName('dropdown');
    var block=document.getElementById('cont-imp');
   if (e.target == temp) {
        block.style.display = "none";
    }
}*/

//to display login dropdown
function LogIn() {
    document.getElementById("login").classList.toggle('show');
}

// Close the dropdown if the user clicks outside of it
/*window.onclick = function(e) {
  if (!e.target.matches('.dropbutton')) {
    var myDropdown = document.getElementById("cont-imp");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
  }

}
/* if (!e.target.matches('.dropdown-content')) {
    var myDropdown = document.getElementById("cont-imp");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      } 
  }

}*/
//show password
function showPassword() {
    var temp = document.getElementById("password-box");
    if (temp.type === "password") {
        temp.type = "text";
    } else {
        temp.type = "password";
    }
}

 //to hide subject dropdowns 
function hideall()
{
  for (var i = 1; i <=8; i++) 
    document.getElementById('sub'+i).style.display = 'none';
  
}
//to hide radio buttons
function selectSem()
{
  if(document.getElementById('sem-dropdown').value=="yearly")
  {
    document.getElementById('hidethis').style.display='none';
  }
  else 
  {
    document.getElementById('hidethis').style.display='block';    
  } 

}

//to display subject choice
function subjectSem()
{
  for (var i = 1; i <=8; i++) 
    document.getElementById('sub'+i).style.display = 'none';

    if(document.getElementById('year-dropdown').value=="fe")
    {
    
        if( document.getElementById('sem-dropdown').value=="odd")
        document.getElementById('sub1').style.display='block';
        else if(document.getElementById('sem-dropdown').value=="even")
        document.getElementById('sub2').style.display = 'block';  
    }

    if(document.getElementById('year-dropdown').value=="se")
    {
   
        if( document.getElementById('sem-dropdown').value=="odd")
        document.getElementById('sub3').style.display='block';
        else if(document.getElementById('sem-dropdown').value=="even")
        document.getElementById('sub4').style.display = 'block';  
    }

    if(document.getElementById('year-dropdown').value=="te")
    {
    
        if( document.getElementById('sem-dropdown').value=="odd")
        document.getElementById('sub5').style.display='block';
        else if(document.getElementById('sem-dropdown').value=="even")
        document.getElementById('sub6').style.display = 'block';  
    }

    if(document.getElementById('year-dropdown').value=="be")
    {
    
        if( document.getElementById('sem-dropdown').value=="odd")
        document.getElementById('sub7').style.display='block';
        else if(document.getElementById('sem-dropdown').value=="even")
        document.getElementById('sub8').style.display = 'block';  
    }
}


//hide save name option
document.getElementById('saveName').style.display="none";
 //to change username 
function change_username() {
  document.getElementById('change-name-box').disabled=false;
  document.getElementById('changeName').style.display="none";
  document.getElementById('saveName').style.display="inline";

}

//to open or close change password modal
{
var modal = document.getElementById('change-password-modal');
var btn = document.getElementById("change-password");
var span = document.getElementsByClassName("close")[0];
// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
}