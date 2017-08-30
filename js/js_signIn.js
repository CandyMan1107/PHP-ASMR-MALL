function check_input() {
    if (document.sign_form.pass.value != document.sign_form.pass_confirm.value) {
        alert("비밀번호가 일치하지 않습니다. \n다시 입력해주세요.");
        document.sign_form.pass.focus();
        document.sign_form.pass.select();

        return;
    } else {
        document.sign_form.submit();
    }
}