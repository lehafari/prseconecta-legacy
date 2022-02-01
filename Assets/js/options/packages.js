const btnAddPackage = document.querySelector("#btnaddpackageinformation");
const formPackage = document.querySelector("#formPackage");
const listPackageInfo = document.querySelector("#listPackageInfo");

document.addEventListener("DOMContentLoaded", function (e) {
  if (btnAddPackage) {
    btnAddPackage.addEventListener("click", function (e) {
      const htmlTemplate = `
        <div class="mt-3" data-id="${indexPackage}">
          <div class="d-flex">
          <input type="text"
            placeholder="Enter Item"
            class="form-control form-control-sm" name="package-information[${indexPackage}][item]">
            <button class="btn-info btn-sm ml-2 handle mb-2"
              title="Move Item" type="button">
              <i class='bx bx-menu'></i>
            </button>
            <button class="btn-danger btn-sm ml-1 mb-2"
            title="Delete Item" type="button" onclick="delInfoPackage(this)" >
              <i class='bx bxs-trash'></i>
            </button>
          </div>
          <input type="text"
            placeholder="Enter Item Value"
          class="form-control form-control-sm"
          name="package-information[${indexPackage}][item_value]">
        </div>
      `;

      $("#listPackageInfo").append(htmlTemplate);
      indexPackage++;
    });
  }

  if (formPackage) {
    const sortablePackages = new Sortable(listPackageInfo, {
      chosenClass: "seleccionado",
      ghostClass: "fantasma",
      dragClass: "drag",
      animation: 150,
      handle: ".handle",

      store: {
        get: (sortable) => {
          return ordenPackage ? ordenPackage.split(",") : [];
        },
      },
    });

    formPackage.addEventListener("submit", function (e) {
      e.preventDefault();
      const titulo = this.titulo.value;

      if (titulo.trim() === "") {
        swal("", "Title can't be empty, please fill it", "error");
        return;
      }

      const url = "/settings/updatePackage";

      function fntSuccess({ msg }) {
        swal("Packages", msg, "success");
      }

      const formData = new FormData(this);

      const orden = sortablePackages.toArray();
      formData.append("orden", orden.join(","));
      ajax(url, "POST", formData, fntSuccess);
    });
  }
});

function delInfoPackage(btn) {
  const tr = btn.parentElement.parentElement;
  $(tr).fadeOut("slow", () => {
    $(tr).remove();
  });
}
