const form = document.querySelector(".contact-form"), //The form variable, which is the selected element inside the container with class "contact-form"
statusTxt = form.querySelector(".button-area span"); //The text status, which is the selected element inside the form container with class "button-area span" (the span element inside the button area)

//When the contact form is submitted
form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
    statusTxt.style.color = "#0D6EFD";
    statusTxt.style.display = "block";

    let xhr = new XMLHttpRequest(); //creating new xml object
    xhr.open("POST", "message.php", true); //sending post request to message.php file
    xhr.onload = ()=>{
        if(xhr.readyState == 4 && xhr.status == 200) { //if Ajax response status is 200 & ready state is 4 (meaning there was no error)
            let response = xhr.response; //creating the 'response' variable to store the Ajax response
            if(response.indexOf("Email and message required!") != -1 ||
                response.indexOf("Enter a valid email address!") != -1 ||
                response.indexOf("Sorry, failed to send your message!") != -1) {
                    statusTxt.style.color = 'red';
                }else {
                    form.reset();
                    setTimeout(()=> {
                        statusTxt.style.display = "none";
                    }, 3000);
                }
            statusTxt.innerText = response;
        }
    }
    let formData = new FormData(form); //creating new form data object. This object represents the information given by the user
    xhr.send(formData); //sending form data
}