const form = document.getElementById('form');
form.addEventListener('submit', (e) => {
    const errormsg = document.getElementsByClassName('error');
    const frminp = document.getElementsByClassName('frminp');
    const uname = document.getElementById('uname').value;
    const pwd = document.getElementById('pwd').value;

    function setError(msg, loc) {
        if (msg == "") {
            errormsg[loc].innerHTML = msg;
            frminp[loc].style.borderColor = "green";
        }
        else {
            e.preventDefault();
            errormsg[loc].innerHTML = msg;
            frminp[loc].style.borderColor = "red";
        }
    }

    if (uname == "")
        setError("Enter a valid username!", 0);
    else if ((uname.search(/[0-9]+/) == -1))
        setError("Use atleast 1 number!", 0);
    else if (uname.length < 0)
        setError("Username must have min 8 char length!", 0);
    else
        setError("", 0);


    if (pwd == "")
        setError("Enter a password!", 1);
    else if (pwd.length < 8 || pwd.length > 12)
        setError("Min 8 and Max 12 characters!", 1);
    else if (pwd != pwd2)
        setError("Password Mismatch!", 1);
    else if ((pwd.search(/[0-9]+/) == -1))
        setError("Use atleast 1 number", 1);
    else if ((pwd.search(/[A-Z]+/) == -1))
        setError("Use atleast 1 uppercase letter", 1);
    else
        setError("", 1);
})