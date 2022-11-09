$(document).ready(function() {

     const inputComment = document.querySelector("#comment");
     const inputRadio1 = document.querySelector("#star1");
     const inputRadio2 = document.querySelector("#star2");
     const inputRadio3 = document.querySelector("#star3");
     const inputRadio4 = document.querySelector("#star4");
     const inputRadio5 = document.querySelector("#star5");
     const btnSubmit2 = document.getElementById('add');
    
     // set the default state for submit button is dasbled
     btnSubmit2.disabled = true;
     console.log("anyád") ;
     inputComment.addEventListener("keyup", inputEmpty2);
     inputRadio1.addEventListener("change", inputEmpty2);
     inputRadio2.addEventListener("change", inputEmpty2);
     inputRadio3.addEventListener("change", inputEmpty2);
     inputRadio4.addEventListener("change", inputEmpty2);
     inputRadio5.addEventListener("change", inputEmpty2);

     function inputEmpty2() {
        const radio1 = document.getElementById('star1').checked;
        const radio2 = document.getElementById('star2').checked;;
        const radio3 = document.getElementById('star3').checked;;
        const radio4 = document.getElementById('star4').checked;;
        const radio5 = document.getElementById('star5').checked;;
         const valueComment = document.querySelector("#comment").value;
         const valueAdd = document.querySelector("#add").value;

         console.log({
            radio1,
            radio2,
            radio3,
            radio4,
            radio5,
             valueComment,
             valueAdd
         });
         if ((radio1 === true || radio2 === true  || radio3 === true || radio4 === true || radio5 === true ) && valueComment !== '') {
             btnSubmit2.disabled = false;
         } else {
             btnSubmit2.disabled = true;
         }
     }

     
})