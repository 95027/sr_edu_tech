$(document).ready(function (){
    $('#listing').submit(function (e){
        e.preventDefault();

        let name = document.listing.name.value;
        let age = document.listing.age.value;
        let email = document.listing.email.value;
        let dob = document.listing.dob.value;
        let contact = document.listing.contact.value;
        let image = document.listing.image.value;

        let alphaExp = /^[a-zA-Z ]+$/;
        let emailExp=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        let status1=status2=status3=status4=status5=status6 = false;

        // for name
        if(name == ""){
            document.getElementById('nameMsg').innerHTML = "Please enter your name";
        }
        else{
            if(name.match(alphaExp)){
               document.getElementById('nameMsg').innerHTML = "";
               status1 = true;
            }
            else{
                document.getElementById('nameMsg').innerHTML = "Please enter characters only";
            }
        }

        // for age
        if(age == ""){
            document.getElementById('ageMsg').innerHTML = "Please enter your age";
        }
        else{
            if(Number(age)){
               document.getElementById('ageMsg').innerHTML = "";
               status2 = true;
            }
            else{
                document.getElementById('ageMsg').innerHTML = "Please enter numbers only";
            }
        }

        //  fpr email
        if(email == ""){
            document.getElementById('emailMsg').innerHTML = "Please enter your email";
        }
        else{
            if(email.match(emailExp)){
               document.getElementById('emailMsg').innerHTML = "";
               status3 = true;
            }
            else{
                document.getElementById('emailMsg').innerHTML = "Please enter valid email id only";
            }
        }

        // for dob
        if(dob == ""){
            document.getElementById('dobMsg').innerHTML = "Please select your dob";
        }
        else{
            const currDate = new Date();
            let selectedDate = new Date(dob);

            if(selectedDate > currDate){
                document.getElementById('dobMsg').innerHTML = "Age should not be greater than current date";
            }
            else{
                document.getElementById('dobMsg').innerHTML = "";
                status4 = true;
            }
        }

        // for contact
        if(contact == ""){
            document.getElementById('contactMsg').innerHTML = "Please enter your mobile number";
        }
        else{
            if(Number(contact)){
                if(contact.length === 10){
                    document.getElementById('contactMsg').innerHTML = "";
                    status5 = true;
                }
                else{
                    document.getElementById('contactMsg').innerHTML = "Please enter 10 digit mobile number";
                }
            }
            else{
                document.getElementById('contactMsg').innerHTML = "Please enter numbers only";
            }
        }

        // for image
        if(image == ""){
            document.getElementById('imageMsg').innerHTML = "Please select your image";
        }
        else{
            document.getElementById('imageMsg').innerHTML = "";
            status6 = true;
        }

        // submit
        if(status1 == true && status2 == true && status3 == true && status4 == true && status5 == true && status6 == true){

            this.submit();
        }
    });

})