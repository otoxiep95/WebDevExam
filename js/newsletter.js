const openModalBtn = document.querySelector(".newsletter__btn");
const closeModalBtn = document.querySelector(".close__modal");
const newsletterModal = document.querySelector(".newsletter__modal");

openModalBtn.addEventListener("click", function() {
  newsletterModal.style.display = "grid";
});
closeModalBtn.addEventListener("click", function() {
  newsletterModal.style.display = "none";
});

$(document).on("click", ".receiveEmailBtn", function() {
  event.preventDefault();
  var newsletterEmailInp = $("#newsletterEmail")[0];
  console.log($("#newsletterEmail")[0]);
  var newsletterEmail = $("#newsletterEmail").val();
  console.log(validateEmail(newsletterEmailInp));
  if (validateEmail(newsletterEmailInp)) {
    $.ajax({
      url: "api/api-send-news-letter.php",
      method: "POST",
      data: { email: newsletterEmail },
      dataType: "JSON"
    })
      .done(function(data) {
        console.log("done");
        console.log(data);
      })
      .fail();
  }
  newsletterModal.style.display = "none";
});

function validateEmail(oElement) {
  var sValue = oElement.value;
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (re.test(String(sValue).toLowerCase()) == false) {
    oElement.classList.add("error");
  }
  if (oElement.classList.contains("error")) {
    return false;
  } else {
    return true;
  }
}
