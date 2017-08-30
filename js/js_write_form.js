function check_input() {
    if (!document.board_form.pName.value) {
        alert("상품명을 입력하세요!");
        document.board_form.pName.focus();
        return;
    }

    else if (!document.board_form.pTrueName.value) {
        alert("상품 상세명을 입력하세요!");
        document.board_form.pTrueName.focus();
        return;
    }

    else if (!document.board_form.pPrice.value) {
        alert("상품가격을 입력하세요!");
        document.board_form.pPrice.focus();
        return;
    }

    else if (!document.board_form.pSubs.value) {
        alert("상품정보를 입력하세요!");
        document.board_form.pSubs.focus();
        return;
    }

    else if (!document.board_form.pCount.value) {
        alert("상품재고를 입력하세요!");
        document.board_form.pCount.focus();
        return;
    }

    document.board_form.submit();
}