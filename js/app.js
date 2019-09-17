function createProperty() {
  event.preventDefault();
  console.log($("#addProperty form")[0]);
  $.ajax({
    url: "/exam-project/api/api-create-property.php",
    method: "POST",
    data: new FormData($("#addProperty form")[0]),
    dataType: "JSON",
    contentType: false,
    cache: false,
    processData: false
  })
    .done(function(data) {
      console.log(data);
      if (data.status == 1) {
        //TODO create new element with property
        var sDivNewProperty = `<div id="${data.property.id}" class="property">
                                  <img src="images/property-img/${data.property.image}" alt="">
                                  <div class="agent__property__info">
                                      <div class="property__price">
                                          <label>Price: $</label><input class="update-property-input" data-update="price" data-min="1" data-max="9999999999999" type="number" value="${data.property.price}">
                                      </div>
                                      <div>
                                          <h3 class="property__adress">${data.property.address}</h3>
                                          <h4 class="property__zip">${data.property.zipcode}, Denmark</h4>
                                      </div>
                                      <button>Delete</button>
                                  </div>
                                 </div>`;
        $("#agent_properties").prepend(sDivNewProperty);
      }
    })
    .fail();
}

$(document).on("click", ".like__property__btn", function() {
  event.preventDefault();
  var propertyId = $(this)
    .parent()
    .parent()
    .parent()
    .attr("id");
  $(this).remove();
  $.ajax({
    url: "api/api-like-property.php",
    data: { propertyId: propertyId },
    dataType: "JSON"
  })
    .done(function(data) {
      console.log(data);
    })
    .fail();
});

$(document).on("click", ".unlike__property__btn", function() {
  event.preventDefault();
  var propertyId = $(this)
    .parent()
    .parent()
    .attr("id");
  $(this)
    .parent()
    .parent()
    .remove();
  $.ajax({
    url: "api/api-unlike-property.php",
    data: { propertyId: propertyId },
    dataType: "JSON"
  })
    .done(function(data) {
      console.log(data);
    })
    .fail();
});

$(document).on("click", ".delete__property__btn", function() {
  event.preventDefault();
  var propertyId = $(this)
    .parent()
    .parent()
    .attr("id");
  $("#" + propertyId).remove();

  $.ajax({
    url: "/exam-project/api/api-delete-property.php",
    data: { id: propertyId },
    dataType: "JSON"
  })
    .done(function(data) {
      console.log(data);
    })
    .fail();
});

$(document).on("blur", ".update-agent-input", function() {
  if (fvUpdateProfileInfo(this)) {
    var sDataType = $(this).attr("data-type");
    var sUpdateKey = $(this).attr("data-update");
    var sNewValue = $(this).val();

    console.log("agentId", agentId);
    console.log("sUpdateKey", sUpdateKey);
    console.log("sNewValue", sNewValue);
    $.ajax({
      url: "api/api-update-agent.php",
      method: "POST",
      data: { id: agentId, type: sDataType, key: sUpdateKey, value: sNewValue }
    }).done(function() {
      console.log("agent updated");
    });
  }
});

$(document).on("blur", ".update-user-input", function() {
  if (fvUpdateProfileInfo(this)) {
    var sDataType = $(this).attr("data-type");
    var sUpdateKey = $(this).attr("data-update");
    var sNewValue = $(this).val();

    $.ajax({
      url: "api/api-update-user.php",
      method: "POST",
      data: { id: userId, type: sDataType, key: sUpdateKey, value: sNewValue }
    }).done(function() {
      console.log("user updated");
    });
  }
});

$(document).on("blur", ".update-property-input", function() {
  if (fvUpdatePropertyPrice(this)) {
    // var sDataType = $(this).attr("data-type");
    // var sUpdateKey = $(this).attr("data-update");
    var propertyId = $(this)
      .parent()
      .parent()
      .parent()
      .attr("id");
    console.log(propertyId);
    var sNewValue = $(this).val();

    console.log("agentId", agentId);
    //console.log("sUpdateKey", sUpdateKey);
    console.log("sNewValue", sNewValue);
    $.ajax({
      url: "api/api-update-property.php",
      method: "POST",
      data: { id: propertyId, value: sNewValue },
      dataType: "JSON"
    }).done(function() {
      console.log("property updated");
    });
  }
});
