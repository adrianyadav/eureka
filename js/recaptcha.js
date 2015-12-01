$("#contactForm").validate({
    submitHandler: function (form) {
        var formData = $("#contactForm").serialize().split("&g-recaptcha-response=");
        var captcha = formData[1].split("&submit=Submit")[0];
        //console.log($("#contactForm").serialize());
        //console.log(captcha);

        $.ajax({
            type: "POST",
            url: 'php/recaptcha.php',
            data: {
                data: captcha
            },
            complete: function (response) {
                console.log(response.responseText);
                if (response.responseText == "true") {
                    $.ajax({
                        dataType: 'jsonp',
                        url: "http://getsimpleform.com/messages/ajax?form_api_token=6af572a5c833e148c15321b131b2628e",
                        data: formData[0],
                    }).done(function () {
                        window.location.href = "/index.php";
                    });
                } else {
                    alert("Please confirm you're not a robot by ticking the box below");
                }
            },
            error: function () {
                $('#output').html('Bummer: there was an error!');
            }
        });

    }
});