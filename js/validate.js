function fnbIsFormValid(oForm) {
  console.log(oForm.querySelectorAll("input[data-type]"));
  fvDo(oForm.querySelectorAll("input[data-type]"), function(oElement) {
    oElement.classList.remove("error");
  });
  fvDo(oForm.querySelectorAll("input[data-type]"), function(oElement) {
    var sValue = oElement.value;
    var sDataType = oElement.getAttribute("data-type"); // $(oInput).attr('data-type')
    var iMin = oElement.getAttribute("data-min"); //$(oInput).attr('data-min')
    var iMax = oElement.getAttribute("data-max"); // $(oInput).attr('data-max')
    switch (sDataType) {
      case "string":
        if (sValue.length < iMin || sValue.length > iMax) {
          oElement.classList.add("error");
        }
        break;
      case "integer":
        if (
          !parseInt(sValue) ||
          parseInt(sValue) < parseInt(iMin) ||
          parseInt(sValue) > parseInt(iMax)
        ) {
          oElement.classList.add("error");
        }
        break;
      case "email":
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (re.test(String(sValue).toLowerCase()) == false) {
          oElement.classList.add("error");
        }
        break;
      case "zipcode":
        var re = /^(?:[1-24-9]\d{3}|3[0-8]\d{2})$/;
        if (re.test(String(sValue).toLowerCase()) == false) {
          oElement.classList.add("error");
        }
        break;
      default:
    }
  });

  if (oForm.querySelectorAll("input.error").length) {
    return false;
  }
  return true;
}

function fvSignup(oBtn) {
  console.log("clicked");
  var frmSignup = document.querySelector("#frmSignup");
  return fnbIsFormValid(frmSignup);
}
function fvLogin() {
  console.log("clicked");
  var frmLogin = document.querySelector("#frmLogin");
  return fnbIsFormValid(frmLogin);
}
function fvAddProperty() {
  console.log("clicked");
  var frmAddProperty = document.querySelector("#addPropertyForm");
  if (fnbIsFormValid(frmAddProperty)) {
    createProperty();
  } else {
    console.log("return false");
    return false;
  }
}
function fvUpdatePropertyPrice(oElement) {
  oElement.classList.remove("error");
  var sValue = oElement.value;
  var sDataType = oElement.getAttribute("data-type");
  var iMin = oElement.getAttribute("data-min");
  var iMax = oElement.getAttribute("data-max");
  console.log(sValue);
  if (!sValue || sValue < iMin || sValue > iMax) {
    oElement.classList.add("error");
  }

  if (oElement.classList.contains("error")) {
    console.log("error");
    return false;
  } else {
    console.log("good");
    return true;
  }
}

function fvUpdateProfileInfo(oElement) {
  oElement.classList.remove("error");
  var sValue = oElement.value;
  var sDataType = oElement.getAttribute("data-type");
  var iMin = oElement.getAttribute("data-min");
  var iMax = oElement.getAttribute("data-max");
  switch (sDataType) {
    case "string":
      if (sValue.length < iMin || sValue.length > iMax) {
        oElement.classList.add("error");
      }
      break;
    case "email":
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (re.test(String(sValue).toLowerCase()) == false) {
        oElement.classList.add("error");
      }
      break;
    default:
  }

  if (oElement.classList.contains("error")) {
    return false;
  } else {
    return true;
  }
}

// **************************************************
function fvDo(aElements, fvCallback) {
  for (var i = 0; i < aElements.length; i++) {
    fvCallback(aElements[i]);
  }
}
