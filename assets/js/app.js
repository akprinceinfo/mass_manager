
// Add Meal JS Function Add

function toggleOptions() {
    var inputState = document.getElementById("Select_For_Member");
    var mySelect = document.getElementById("mySelect");
    var SelectMassMembers = document.getElementById("SelectMassMembers");

    if (Select_For_Member.value === "2") {
        // mySelect.disabled = true;
        mySelect.style.display = "none";
        SelectMassMembers.style.display= "none";
        
    }  else if (Select_For_Member.value === "1") {
        // mySelect.disabled = false;
        mySelect.style.display = "block";
        SelectMassMembers.style.display= "block";
    }
}