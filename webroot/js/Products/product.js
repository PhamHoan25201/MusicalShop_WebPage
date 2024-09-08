// ----------------------------------------------------------------------------

//  Project name : Musical Shop (WebPage)
//  Class Name   :
//  Overview     : Script xử lý hoạt động màn hình sản phẩm
//  Programmer   : TaiTD@SSV
//  Created Date : 2024/09/08
//  Version      :  0.0.0.1

// ----------< History >--------------------------------------------------------
//  ID           : 
//  Programmer   :
//  Updated Date :
//  Comment      :
//  Version      :  
// -----------------------------------------------------------------------------

function displayModal(element) {
    var product = element.parentElement.parentElement;
    document.getElementById("modalProductName").innerHTML = product.getElementsByTagName("a")[0].innerHTML;
    document.getElementById("modalProductImage").src = product.getElementsByTagName("img")[0].src;
    document.getElementById("modal").style.display = 'block';
}

function closeModal() {
    document.getElementById("modal").style.display = 'none';
}

function cartAdd() {
    document.getElementById("modal").style.display = 'none';
}