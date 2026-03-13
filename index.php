    <!-- jquery CDN  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="logindiv">
        <form id="loginform">
            <p>Login</p>
            <label for="">Username</label>
            <input type="text" placeholder="Enter username" name="username">
            <label for="">password</label>
            <input type="password" placeholder="Enter password" name="psw">
            <input type="submit" value="log In">
            <p id="response">resdp</p>
        </form>
    </div>
    <style>
.logindiv {
    width: 98vw;
    height: 98vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

#loginform {
    width: 400px;
    display: flex;
    flex-direction: column;
    gap: 10px;

    border: 1px solid black;
    border-radius: 4px;
}

#loginform p {
    font-size: 30px;
    color: blue;
    text-align: center;
}

#loginform label {
    font-size: 20px;
    text-align: left;
}

#loginform input {
    padding: 5px 10px;
}
    </style>
    <script>
$(document).ready(function() {
    $("#loginform").on("submit", function(e) {
        e.preventDefault();
        let userdata = new FormData(this);
        $.ajax({
            url: 'functions/login.php',
            type: 'POST',
            data: userdata,
            processData: false,
            contentType: false,
            success: function(res) {
                $("#response").html(res);
            },
            error: function() {
                alert("Error while login");
            }

        })
    })
})
    </script>