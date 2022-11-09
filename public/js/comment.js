$(document).ready(function() {
    const inputValue = document.querySelector(".radio");
     const inputComment = document.querySelector("#comment");
     const inputAdd = document.querySelector("#add");
    
     inputAdd.disabled = true;
     $("#comment").on("change", function(){
        var commentVal = $("#comment").val();

        if(commentVal != ""){

            document.querySelector('#add').disabled = false;
        }
     })
     
})