    <!-- jquery CDN  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="logindiv">
        <form id="loginform">
            <p>Sign UP</p>
            </p>
            <label for="">Username</label>
            <input type="text" placeholder="Enter username" name="username">
            <label for="">password</label>
            <input type="password" placeholder="Enter password" name="psw">
            <label for=""> Confirm password</label>
            <input type="password" placeholder="Retype password" name="cpsw">
            <input type="submit" value="Register">
            <p>Already have an account? <a href="index.php">Login here</a></p>
            <p id="response"></p>
        </form>

    </div>
    <style>
/* Classic clean form styling */
html,
body {
    height: 100%;
    margin: 0;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    background: radial-gradient(circle at top, #f7f9fb 0%, #d9e2ec 100%);
    color: #1f2937;
}

.logindiv {
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

#loginform {
    width: min(420px, 100%);
    background: #ffffff;
    padding: 30px 26px;
    border-radius: 16px;
    box-shadow: 0 18px 40px rgba(15, 23, 42, 0.12);
    display: flex;
    flex-direction: column;
    gap: 16px;
}

#loginform p {
    font-size: 1.9rem;
    font-weight: 700;
    color: #0f172a;
    text-align: center;
    margin: 0;
}

#loginform label {
    font-size: 0.95rem;
    font-weight: 600;
    color: #334155;
}

#loginform input[type="text"],
#loginform input[type="password"] {
    width: 100%;
    padding: 12px 14px;
    font-size: 1rem;
    border: 1px solid #cbd5e1;
    border-radius: 10px;
    background: #f8fafc;
    outline: none;
    transition: border-color 160ms ease, box-shadow 160ms ease;
}

#loginform input[type="text"]:focus,
#loginform input[type="password"]:focus {
    border-color: #60a5fa;
    box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.2);
    background: #ffffff;
}

#loginform input[type="submit"] {
    width: 100%;
    padding: 12px 14px;
    border: none;
    border-radius: 10px;
    font-size: 1rem;
    font-weight: 700;
    color: #ffffff;
    background: linear-gradient(135deg, #2563eb, #7c3aed);
    cursor: pointer;
    transition: transform 120ms ease, filter 120ms ease;
}

#loginform input[type="submit"]:hover {
    filter: brightness(1.08);
    transform: translateY(-1px);
}

#loginform input[type="submit"]:active {
    transform: translateY(0);
}

#response {
    font-size: 0.95rem;
    min-height: 1.2rem;
    text-align: center;
    color: #dc2626 !important;
    margin: 0;
}
    </style>
    <script>
$(document).ready(function() {
    $("#loginform").on("submit", function(e) {
        e.preventDefault();
        let userdata = new FormData(this);
        $.ajax({
            url: 'functions/signup.php',
            type: 'POST',
            data: userdata,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(res) {
                if (res.status === "failed") {
                    $("#response").html(res.message);
                } else if (res.status === "success") {
                    location.href = "logged/index.php";

                }
            },
            error: function() {
                alert("Error while login");
            }

        })
    })
})
    </script>