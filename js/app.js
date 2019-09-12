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
                                          <label>Price: $</label><input class="update-input" data-update="price" type="number" value="${data.property.price}">
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
