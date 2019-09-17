const inpSearch = document.querySelector("#inpSearch");
const divResults = document.getElementById("results");

function checkSearh() {
  if ($("#inpSearch").val().length < 2) {
    console.log("enter something");
    $("#inpSearch").addClass("error");
  }
}

inpSearch.addEventListener("input", function() {
  console.log("input");
  if ($("#inpSearch").val().length == 0) {
    // console.log('enter something');
    $("#inpSearch").removeClass("error");
    $("#results").hide();
    return;
  }

  if ($("#inpSearch").val().length < 1) {
    // console.log('enter something');
    $("#inpSearch").addClass("error");
    return;
  }

  $.ajax({
    url: "api/api-search-zipcodes.php",
    data: $("#frmSearch").serialize(),
    dataType: "JSON"
  })
    .done(function(data) {
      var matches = data.matches;
      console.log(matches);
      $("#results").empty();
      if (matches.length > 0) {
        matches.forEach(function(match) {
          match = match.replace(/</g, "&lt;").replace(/>/g, "&gt;");
          var el = document.createElement("a");
          var divEl = document.createElement("div");
          el.href = "properties-main.php?zip=" + match;
          divEl.textContent = match;
          divResults.append(el);
          el.append(divEl);
        });
      } else {
        var el = document.createElement("div");
        el.textContent = "No matches found";
        divResults.append(el);
      }
    })
    .fail(function() {
      console.log("error");
    });

  if (inpSearch.value.length == 0) {
    divResults.style.display = "none";
  } else {
    divResults.style.display = "block";
  }
});
