//are you sure delete
var deletes = document.getElementsByClassName("deleteBtn");
for(var i=0; i<deletes.length; i++)
{
    deletes[i].addEventListener("click", function(event){
        var shouldWeDelete = confirm("Are you sure?"); // returns true if ok, false, if no/cancel

        if (!shouldWeDelete)
        {
            // if false (cancel)
            event.preventDefault(); // stops the link from being followed
        }
    })
}