$("#userForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Did you fill in the form properly?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm(event.target.action);
    }
});

function submitForm($url) {
    // Initiate Variables With Form Content
    let formData = $("#userForm").serialize();

    $.ajax({
        type: "POST",
        url: $url,
        data: formData,
        success: function (response) {
            if (response === "success") {
                formSuccess();
            } else {
                formError();
                submitMSG(false, 'Error');
            }
        },
        error: function (xhr, text) {
            let resp = JSON.parse(xhr.responseText);
            let msg = text;
            if (resp.errors) msg = resp.message + ' ' + JSON.stringify(resp.errors);
            formError();
            submitMSG(false, msg);
        }
    });
}

function formSuccess() {
    $("#userForm")[0].reset();
    submitMSG(true, "Message Submitted!")
}

function formError() {
    $("#userForm").removeClass().addClass('shake animated')
        .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass();
        });
}

function submitMSG(valid, msg) {
    if (valid) {
        var msgClasses = "text-center tada animated text-success";
    } else {
        var msgClasses = "text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}

function getConfirm() {
    return confirm("Do you really want to delete the news?");
}
