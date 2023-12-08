function login() {
    // get email and password values from form
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    // connect to AWS database

    var mysql = require('mysql');
    var connection = mysql.createConnection({
        host: 'boon-db.cafgull3umi5.us-west-2.rds.amazonaws.com',
        port: '3306',
        user: 'admin',
        password: 'Ws!dw1ds',
        database: 'Boon'
    });

    // query database to find matching email and password
    var query = "SELECT * FROM Customer WHERE email = '" + email + "' AND password = '" + password + "'";
    connection.query(query, function (error, results, fields) {
        if (error) throw error;
        if (results.length == 1) {
            // redirect to home page
            window.location.href = "home.html";
        } else {
            // display error message
            alert("Invalid email or password. Please try again.");
        }
    });

    // close database connection
   // connection.end();
}

function forgotPassword() {
    // redirect to forgot password page. This page still needs to be created.
    window.location.href = "forgot-password.html";
}

function createAccount() {
    // redirect to create account page
    window.location.href = "Registration.html";
}