const form = document.getElementById('form');
form.addEventListener('submit', (e) => {
    const errormsg = document.getElementsByClassName('error');
    const frminp = document.getElementsByClassName('frminp');
    function setError(msg, loc) {
        if (msg == "") {
            errormsg[loc].innerHTML = msg;
            frminp[loc].style.borderColor = "green";
        }
        else {
            e.preventDefault();
            if (msg == "Password Mismatch!") {
                errormsg[loc + 1].innerHTML = msg;
                const pswd2 = document.getElementById('pswd2');
                pswd2.value = "";
            }
            errormsg[loc].innerHTML = msg;
            frminp[loc].style.borderColor = "red";
        }
    }
    var letters = /^[A-Za-z]+$/;
    var numbers = /^[0-9]+$/;
    const fname = document.getElementById('fname').value;
    const lname = document.getElementById('lname').value;
    const phno = document.getElementById('phno').value;
    const eml = document.getElementById('eml').value;
    const height = document.getElementById('height').value;
    const addr = document.getElementById('addr1').value;
    const uname = document.getElementById('uname').value;
    const pswd1 = document.getElementById('pswd1').value;
    const pswd2 = document.getElementById('pswd2').value;
    const gend = document.getElementById('gend').value;
    const job = document.getElementById('job').value;
    const file = document.getElementById("finput").value;
    if (fname == "" || !fname.match(letters))
        setError("Enter a valid name!", 0);
    else
        setError("", 0);

    if (lname == "" || !lname.match(letters))
        setError("Enter a valid name!", 1);
    else
        setError("", 1);

    if (phno.length != 10 || !phno.match(numbers))
        setError("Enter a valid phone number!", 2);
    else
        setError("", 2);

    if (!eml.match("@"))
        setError("Enter a valid Email ID!", 3);
    else
        setError("", 3);

    if (gend == "none")
        setError("Select a gender", 4);
    else
        setError("", 4);

    if (job == "" || !job.match(letters))
        setError("Enter a valid job!", 5);
    else
        setError("", 5);

    if (addr == "")
        setError("Enter your address!", 6);
    else
        setError("", 6);

    if (height == "none")
        setError("Enter a valid religion!", 7);
    else
        setError("", 7);

    if (uname == "")
        setError("Enter a valid username!", 8);
    else if ((uname.search(/[0-9]+/) == -1))
        setError("Use atleast 1 number!", 8);
    else if (uname.length < 8)
        setError("Username must have min 8 char length!", 8);
    else
        setError("", 8);

    if (pswd1 == "")
        setError("Enter a password!", 9);
    else if (pswd1.length < 8 || pswd1.length > 12)
        setError("Min 8 and Max 12 characters!", 9);
    else if (pswd1 != pswd2)
        setError("Password Mismatch!", 9);
    else if ((pswd1.search(/[0-9]+/) == -1))
        setError("Use atleast 1 number", 9);
    else if ((pswd1.search(/[A-Z]+/) == -1))
        setError("Use atleast 1 uppercase letter", 9);
    else {
        setError("", 9);
        setError("", 10);
    }

    if (file == "")
        setError("Please upload your photo", 11);
    else
        setError("", 11);


})

function upload() {
    var imgcanvas = document.getElementById("canv1");
    var fileinput = document.getElementById("finput");
    var image = new SimpleImage(fileinput);
    image.drawTo(imgcanvas);
}