document.addEventListener("DOMContentLoaded", function() {
    var otpButton = document.getElementById("otpButton");
    var message = document.getElementById("message");
    var registrationForm = document.getElementById("registrationForm");

    otpButton.addEventListener("click", () => {
        var formData = new FormData(registrationForm);

        fetch('register.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not Good ' + response.statusText);
            }
            return response.text();
        })
        .then(data => {
            if (data.includes("OTP sent successfully")) {
                message.textContent = "OTP sent successfully!";
            } else {
                message.textContent = "Error sending OTP. Please try again.";
            }
        })
        .catch(error => {
            message.textContent = "Error sending OTP. Please try again.";
        });
    });
});
