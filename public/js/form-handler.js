$("#userForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Did you fill in the form properly?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm(event.target);
    }
});

function submitForm(form) {
    // Initiate Variables With Form Content
    let formData = $(form).serialize();

    $.ajax({
        type: "POST",
        url: form.action,
        data: formData,
        success: function (response) {
            if (response === "success") {
                formSuccess();
            } else {
                formError();
                submitMSG(false, 'Error');
            }
        },
        error: function (xhr) {
            let msg = xhr.responseJSON.message;
            let errors = xhr.responseJSON.errors;

            for (let inputName in errors) {
                if (errors.hasOwnProperty(inputName)) {
                    form[inputName].insertAdjacentHTML(
                        'afterend',
                        '<small class="form-text text-danger">' + errors[inputName] + '</small>'
                    );
                }
            }
            formError();
            submitMSG(false, msg);
        }
    });
}

function formSuccess() {
    $("#userForm")[0].reset();
    $("#userForm").find("small").detach();
    submitMSG(true, "Message Submitted!")
}

function formError() {
    $("#userForm").removeClass().addClass('shake animated')
        .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass();
        });
}

function submitMSG(valid, msg) {
    let msgClasses = "text-center";
    if (valid) {
        msgClasses += " tada animated text-success";
    } else {
        msgClasses += " text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}

function getConfirm() {
    return confirm("Do you really want to delete this?");
}
