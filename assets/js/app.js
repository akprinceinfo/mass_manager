function disableOptions() {
  var selectElement = document.getElementById("inputState");
  var mySelectss = document.getElementById("mySelect");
  var selectedValue = selectElement.value;
  var mySelectssValue = mySelectss.value;

  
   
    if (selectedValue == 'SingleMember') {
       mySelectssValue.disabled = true;
       mySelectssValue.classList.add("highlight");
      alert("bhdvd");
    } else {
        selectedValue.disabled = false;
    }

}
    
    

// Call the function initially
disableOptions();

// Add event listener for change event on select element
document.getElementById("inputState").addEventListener("change", disableOptions);

