let values = 0;
const frmCustomForm = document.querySelector("#frmCustomForm");
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener("mouseenter", Swal.stopTimer);
    toast.addEventListener("mouseleave", Swal.resumeTimer);
  },
});

function showLoaderPage(selectorHide) {
  $(selectorHide).hide();
  $(".divLoader").css("display", "flex");
}

function hideLoaderPage(selectorShow) {
  $(".divLoader").css("display", "none");
  $(selectorShow).fadeIn();
}

function openModal() {
  frmCustomForm.idForm.value = "";
  frmCustomForm.reset();
  changeSettingsModal("NEW", "New Custom Form");
  $(".selectpicker").selectpicker("render");
  $("#modalFormCustomsForms").modal("show");
}

document.addEventListener("DOMContentLoaded", function () {
  if (frmCustomForm) {
    frmCustomForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const titulo = this.titulo.value;
      const idForm = this.idForm.value;
      if (titulo.trim() === "") {
        swal("", "Title cannot be empty", "error");
        return;
      }

      const url =
        idForm.trim() === ""
          ? "/customs-forms/newCustomForm"
          : "/customs-forms/editCustomForm";

      function fntSuccess(respuesta) {
        if (idForm.trim() === "") {
          const { msg, html } = respuesta;
          swal("", msg, "success");
          $(".accordion").append(html);
        } else {
          const { msg } = respuesta;
          $(".nombreTipo").html(titulo);
          $("#data-customform-" + idForm).html(titulo);
          swal("", msg, "success");
          $(".widget-small.info").click(() =>
            editInfoCustomForm(idForm, titulo)
          );
        }
        $("#modalFormCustomsForms").modal("hide");
      }

      ajax(url, "POST", this, fntSuccess);
    });
  }
});

function editInfoTipo(e, idTipo) {
  e.preventDefault();
  const url = base_url + "/customs-forms/getCustomForm/" + idTipo;
  showLoaderPage("#divSubtipos");
  showLoaderPage(".instrucciones");
  Swal.close();
  $.get(url).done((response) => {
    hideLoaderPage(".instrucciones");
    const resultado = JSON.parse(response);
    const { msg, status } = resultado;

    if (status) {
      const { idtipo, title } = resultado.data;
      $(".nombreTipo").html(title);
      const opcionesTipo = document.querySelector("#opcionesTipo");
      if (idtipo == 1) {
        opcionesTipo.classList.replace("d-flex", "d-none");
        $(".widget-small.info").click(() => {});
        $(".widget-small.danger").click((e) => {});
      } else {
        opcionesTipo.classList.replace("d-none", "d-flex");
        $(".widget-small.info").click(() => editInfoCustomForm(idtipo, title));
        $(".widget-small.danger").click((e) => delCustomForm(idtipo));
      }
    } else {
      swal("", msg, "error");
    }
  });
}

function delCustomForm(idtipo) {
  sweetAlertEliminar({
    title: "Delete Custom Form",
    text: "Do you really want to remove the custom form?",
    fnt() {
      const data = "idCustomForm=" + idtipo;
      const url = "/customs-forms/delCustomForm/";

      function fntSuccess({ msg }) {
        swal("Delete", msg, "success");
        $("#data-customform-" + idtipo)
          .parent()
          .parent()
          .parent()
          .remove();
        $(".instrucciones").fadeOut();
      }

      ajax(url, "POST", data, fntSuccess);
    },
  });
}

function editInfoCustomForm(idtipo, titulo) {
  frmCustomForm.titulo.value = titulo;
  frmCustomForm.idForm.value = idtipo;
  changeSettingsModal("UPDATE", "Edit Custom Form");
  $(".selectpicker").selectpicker("render");
  $("#modalFormCustomsForms").modal("show");
}

async function newSubType(idtipo) {
  const { value, isConfirmed } = await Swal.fire({
    title: "Type the new subtype",
    toast: true,
    position: "top",
    padding: "0.8rem",
    showConfirmButton: true,
    showCancelButton: true,
    confirmButtonColor: "#2196f3",
    confirmButtonText: "<i class='bx bxs-save'></i> Save!",
    cancelButtonColor: "#d33",
    input: "text",
    inputLabel: "",
    inputValue: "",
    inputValidator: (value) => {
      return new Promise((resolve) => {
        if (value === "") {
          resolve("You need to write the new subtype");
        } else {
          resolve();
        }
      });
    },
  });

  if (isConfirmed && value !== "") {
    const url = base_url + "/customs-forms/setSubType/";
    $.post(url, { subtype: value, idtipo }).done((response) => {
      const resultado = JSON.parse(response);

      const { msg, status } = resultado;

      if (status) {
        $("#data-customform-" + idtipo)
          .parent()
          .parent()
          .next()
          .find(".tile-body")
          .append(resultado.html);

        Toast.fire({
          icon: "success",
          title: msg,
        });
      }
    });
  }
}

function getSubType(idsubtipo) {
  showLoaderPage(".instrucciones");
  showLoaderPage("#divSubtipos");
  Swal.close();
  const url = base_url + "/customs-forms/getSubtype/" + idsubtipo;
  $.get(url).done((response) => {
    const resultado = JSON.parse(response);
    const { status, msg } = resultado;
    if (status) {
      $("#divSubtipos").html(resultado.html);
      $(".selectpicker").selectpicker("render");
    } else {
      swal("", msg, "error");
    }
    hideLoaderPage("#divSubtipos");
  });
}

async function editSubType(idsubtipo) {
  const spanNameSubtype = document.querySelector(".nameSubtype");
  const { value, isConfirmed } = await Swal.fire({
    title: "Edit the subtype",
    toast: true,
    position: "top",
    padding: "0.8rem",
    showConfirmButton: true,
    showCancelButton: true,
    confirmButtonColor: "#08c0ff",
    confirmButtonText: "<i class='bx bx-edit-alt'></i> Edit!",
    cancelButtonColor: "#d33",
    input: "text",
    inputLabel: "",
    inputValue: spanNameSubtype.innerHTML,
    inputValidator: (value) => {
      return new Promise((resolve) => {
        if (value === "") {
          resolve("You need to type the subtype");
        } else {
          resolve();
        }
      });
    },
  });

  if (isConfirmed && value !== "") {
    const url = base_url + "/customs-forms/setSubType/";
    $.post(url, { subtype: value, idsubtipo }).done((response) => {
      $(`#tipo-subtipo-${idsubtipo} div`).html(value.trim());
      spanNameSubtype.innerHTML = value.trim();
      const resultado = JSON.parse(response);

      const { msg, status } = resultado;

      if (status) {
        Toast.fire({
          icon: "success",
          title: msg,
        });
      }
    });
  }
}

function deleteSubtype(idsubtipo) {
  sweetAlertEliminar({
    title: "Delete Subtype",
    text: "Do you really want to remove the subtype?",
    fnt() {
      const data = "idsubtipo=" + idsubtipo;
      const url = "/customs-forms/delSubtype/";

      function fntSuccess({ msg }) {
        swal("Delete", msg, "success");
        $(`#tipo-subtipo-${idsubtipo}`).remove();
        $("#divSubtipos").html("");
      }

      ajax(url, "POST", data, fntSuccess);
    },
  });
}

function frmFielBuilder(e) {
  e.preventDefault();
  const form = e.target;
  const fieldname = form.fieldname.value;
  const tipo = form.tipo.value;
  const idform = form.idform.value;
  if (fieldname.trim() === "") {
    swal("", "Field name cannot be empty", "error");
    return;
  }
  const url = "/customs-forms/setFieldBuilder";
  function fntSuccess({ idFormBuilder, msg, htmlCard }) {
    if (idform.trim() === "") {
      form.reset();
      $(".selectpicker ").append(`
        <option class="opt-frmBuilder-${idFormBuilder}" value="${idFormBuilder}">${fieldname.trim()}</option>
      `);
      $("#list-group-add-form").append(htmlCard);
    } else {
      newFormDetailTitle("." + form.className);
      document.querySelector(
        `div[data-id="${idform}"] span.contenido`
      ).innerHTML = `
      ${fieldname}               
      
      <span style="color: #aaaaaa;">[${tipo}]</span>
      `;

      const opts = document.querySelectorAll(".opt-frmBuilder-" + idform);
      opts.forEach((opt) => {
        opt.innerHTML = fieldname.trim();
      });
    }
    $("#divSelectValues").remove();
    $(".selectpicker").selectpicker("render");
    $(".selectpicker").selectpicker("refresh");
    swal("", msg, "success");
  }
  ajax(url, "POST", form, fntSuccess);
}

function frmTitleBuilder(e) {
  e.preventDefault();
  const form = e.target;
  const titulo = form.titleBuilder.value;
  const idform = form.idform.value;
  if (titulo.trim() === "") {
    swal("", "Title cannot be empty", "error");
    return;
  }
  const url = "/customs-forms/setTitleSubtype";
  function fntSuccess({ idFormBuilder, msg, htmlCard }) {
    if (idform.trim() === "") {
      form.reset();
      $("#list-group-add-form").append(htmlCard);
    } else {
      newFormDetailTitle("." + form.className);
      document.querySelector(
        `div[data-id="${idform}"] span.contenido`
      ).innerHTML = `
      ${titulo.trim()}
      <span style="color: #aaaaaa;">[titulo]</span>

      `;
    }
    swal("", msg, "success");
  }
  ajax(url, "POST", form, fntSuccess);
}

function editInfoFormBuilder(element, idformbuilder) {
  const url = "/customs-forms/getInfoFormBuilder/" + idformbuilder;
  function fntSuccess({ data }) {
    const {
      field_name,
      idform,
      status,
      type,
      valores,
      placeholder,
      available_search,
    } = data;
    if (type === "titulo") {
      const form = document.querySelector(".frmTitleBuilder");
      const btnSubmit = form.querySelector('button[type="submit"]');
      form.idform.value = idform;
      form.titleBuilder.value = field_name;
      btnSubmit.innerHTML = 'Update <i class="bx bx-pencil" ></i>';
      btnSubmit.classList.replace("btn-primary", "btn-info");
    } else {
      const form = document.querySelector(".frmFielBuilder");
      const btnSubmit = form.querySelector('button[type="submit"]');
      form.idform.value = idform;
      form.fieldname.value = field_name;
      form.placeholder.value = placeholder;
      form.tipo.value = type;
      form.fieldname.value = field_name;
      form.availableForSearches.value = available_search;
      btnSubmit.innerHTML = 'Update <i class="bx bx-pencil" ></i>';
      btnSubmit.classList.replace("btn-primary", "btn-info");

      const select = document.getElementById("tipo");
      if (type === "select" || type === "multi-select") {
        $("#divSelectValues").remove();
        const arrayValores = valores.split(",");
        let html = "";
        arrayValores.forEach((valor) => {
          html += stringValuesSelect(valor);
          values++;
        });
        $(select).after(`
          <div class="mt-3" id="divSelectValues">
            <button type="button" class="btn btn-info btn-sm mb-2" onclick="newItemFormBuilder()" style="box-shadow: none !important;">New Item <i class='bx bx-plus-medical'></i></button>
            ${html}
          </div>
        `);
      }
    }

    window.scrollTo({
      top: 50,
      behavior: "smooth",
    });
  }
  ajax(url, "GET", "", fntSuccess);
}

function newFormDetailTitle(selector) {
  const form = document.querySelector(selector);
  const btnSubmit = form.querySelector('button[type="submit"]');
  form.idform.value = "";
  form.reset();
  btnSubmit.innerHTML = 'Save <i class="bx bx-save"></i>';
  $(form).find("#divSelectValues").remove();
  btnSubmit.classList.replace("btn-info", "btn-primary");
}

function delInfoFormBuilder(element, idformbuilder) {
  sweetAlertEliminar({
    title: "Delete Detail Field",
    text: "Do you really want to remove the detail field?",
    fnt() {
      swal.close();
      const data = "idFieldBuilder=" + idformbuilder;
      const url = "/customs-forms/delFieldBuilder/";

      function fntSuccess({ msg }) {
        const card =
          element.parentElement.parentElement.parentElement.parentElement;
        $(card).remove();

        const opts = document.querySelectorAll(
          ".opt-frmBuilder-" + idformbuilder
        );
        opts.forEach((opt) => {
          opt.parentElement.removeChild(opt);
        });
        $(".selectpicker").selectpicker("render");
        $(".selectpicker").selectpicker("refresh");
        const frmFielBuilder = document.querySelector(".frmFielBuilder");
        const frmTitleBuilder = document.querySelector(".frmTitleBuilder");

        if (frmFielBuilder.idform.value == idformbuilder) {
          newFormDetailTitle("." + frmFielBuilder.className);
        } else if (frmTitleBuilder.idform.value == idformbuilder) {
          newFormDetailTitle("." + frmTitleBuilder.className);
        }

        swal("Delete", msg, "success");
      }

      ajax(url, "POST", data, fntSuccess);
    },
  });
}

function sortableFormBuilder({ name, ordenGet, selector, status, idsubtipo }) {
  const div = document.querySelector(selector);
  console.log(div);
  new Sortable(div, {
    group: {
      name: "shared",
    },
    animation: 150,
    fallbackTolerance: 3, // So that we can select items on mobile
    multiDrag: true, // Enable multi-drag
    chosenClass: "seleccionado",
    ghostClass: "fantasma",
    dragClass: "drag",
    delayOnTouchOnly: true,
    easing: "cubic-bezier(0.895, 0.03, 0.685, 0.22)",
    scroll: true, // Enable the plugin. Can be HTMLElement.
    forceAutoscrollFallback: false, // force autoscroll plugin to enable even when native browser autoscroll is available
    dataIdAttr: "data-id",
    scrollSensitivity: 500, // px, how near the mouse must be to an edge to start scrolling.
    scrollSpeed: 300, // px, speed of the scrolling
    bubbleScroll: true, // apply autoscroll to all parent elements, allowing for easier movement
    store: {
      set: async (sortable) => {
        const orden = sortable.toArray();
        const url = `${base_url}/customs-forms/setOrder`;
        $.post(url, {
          status,
          name,
          orden: orden.join(","),
          idsubtipo,
        });
      },
      get: () => {
        ordenGet = ordenGet === 0 ? "" : ordenGet;
        const orden = ordenGet ? ordenGet.split(",") : [];
        console.log(orden);
        return orden;
      },
    },
  });
}

function newItemFormBuilder() {
  values++;
  $("#divSelectValues").append(stringValuesSelect(""));
}

function onChangeSelectFormBuilder(select) {
  if (
    select.value.trim() === "select" ||
    select.value.trim() === "multi-select"
  ) {
    $("#divSelectValues").remove();
    $(select).after(`
  <div class="mt-3" id="divSelectValues">
    <button type="button" class="btn btn-info btn-sm mb-2" onclick="newItemFormBuilder()" style="box-shadow: none !important;">New Item <i class='bx bx-plus-medical'></i></button>
    ${stringValuesSelect("")}
  </div>
    `);
  } else {
    $("#divSelectValues").remove();
  }
}

function delInfoSelect(element) {
  $(element).parent().remove();
}

function stringValuesSelect(string) {
  return `
  <div class="d-flex">
  <input type="text" placeholder="Enter Item"
    class="form-control form-control-sm" value="${string}"
    name="values[${values}]">
  <button class="btn-danger btn-sm ml-1 mb-2"
    title="Delete Item" type="button"
    onclick="delInfoSelect(this)">
    <i class='bx bxs-trash'></i>
  </button>
</div>
  `;
}

function onChangeSelectOverviews(element, data) {
  const arrayValues = getSelectValues(element);
  const url = base_url + "/customs-forms/setOverviewFields";
  $.post(url, { ...data, values: arrayValues.join(",") });
}

function getSelectValues(select) {
  let result = [];
  let options = select && select.options;
  let opt;

  for (let i = 0, iLen = options.length; i < iLen; i++) {
    opt = options[i];

    if (opt.selected) {
      result.push(opt.value || opt.text);
    }
  }
  return result;
}
