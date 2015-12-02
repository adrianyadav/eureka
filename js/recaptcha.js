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
                        url: "http://getsimpleform.com/messages/ajax?form_api_token=eedb4d5fddba3ec04c04c194b85ee5e4",
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