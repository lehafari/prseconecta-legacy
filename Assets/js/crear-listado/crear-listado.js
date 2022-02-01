function seleccionarListado(btn, action) {
  $(".bx.bxs-check-circle").remove();
  $(btn).append("<i class='bx bxs-check-circle text-success float-right'></i>");
  $("#btnProximo").removeClass("disabled");
  if (action === "listado") {
    document.querySelector(
      "#btnProximo"
    ).href = `${base_url}/crear-listado?listing_type=listar`;
  } else if (action === "anunciar") {
    document.querySelector(
      "#btnProximo"
    ).href = `${base_url}/crear-listado?listing_type=anunciar`;
  }
}
