console.log("toto");

$(document).ready(function () {
  // Lorsque l'utilisateur change une option dans l'un des boutons select
  $(".btnFilterSelectDashboard").change(function () {
    // On récupère le texte sélectionné dans chaque bouton select
    let location = $("#locationProperty option:selected").text();
    let status = $("#dashboardPropertyStatus option:selected").text();
    let type = $("#dashaboardTypeProperty option:selected").text();

    // On parcourt tous les éléments à filtrer
    $(".propertyItem").each(function () {
      let $element = $(this);
      let elementLocation = $element.find(".propertyLocation").text();
      let elementStatus = $element.find(".propertyStatus").text();
      let elementType = $element.find(".propertyType").text();

      // On compare le texte des boutons select avec le texte des éléments
      if ((location === "Choisir une ville" || location === elementLocation) && (status === "Choisir un statut" || status === elementStatus) && (type === "Choisir un type" || type === elementType)) {
        // Si les valeurs correspondent, on affiche l'élément
        $element.show();
      } else {
        // Sinon, on cache l'élément
        $element.hide();
      }
    });
  });

  // add page dashboard
  $("#houseProperty").hide();
  $("#propertyApartment").hide();
  $(".specificationToRent").hide();

  $("#addTypeProperty").change(function () {
    if ($(this).val() == "house") {
      $("#houseProperty").show();
    } else {
      $("#houseProperty").hide();
    }
  });

  $("#addTypeProperty").change(function () {
    if ($(this).val() == "apartment") {
      $("#propertyApartment").show();
    } else {
      $("#propertyApartment").hide();
    }
  });

  $("#addStatut").change(function () {
    if ($(this).val() == "rent") {
      $(".specificationToRent").show();
      $("#price").hide();
    } else {
      $(".specificationToRent").hide();
      $("#price").show();
    }
  });
});

// const fileInput = document.querySelector('input[type=file]');
// const file = fileInput.files[0];

// const xhr = new XMLHttpRequest();
// xhr.open('POST', 'upload.php');

// const formData = new FormData();
// formData.append('photo', file);

// xhr.send(formData);
