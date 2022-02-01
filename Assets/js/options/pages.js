if (document.querySelector("#contenido")) {
  const configTinyMCE = {
    selector: "#contenido",
    width: "100%",
    height: 500,
    statubar: true,
    encoding: "UTF-8",
    plugins: [
      "advlist autolink link lists charmap hr pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
      "table directionality paste ",
    ],
    entity_encoding: "raw",
    end_container_on_empty_block: true,
    toolbar_mode: "sliding",
    toolbar: `undo redo | bold italic underline | fontselect fontsizeselect formatselect | 
      alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | 
      forecolor backcolor | fullscreen  |  link anchor`,
  };
  tinymce.init(configTinyMCE);
}

const formEditarPage = document.querySelector("#formEditarPage");

document.addEventListener("DOMContentLoaded", function () {
  if (formEditarPage) {
    formEditarPage.addEventListener("submit", function (e) {
      e.preventDefault();
      const titulo = this.titulo.value;

      if (titulo.trim() === "") {
        swal("", "Title cannot be empty", "error");
        return;
      }

      const url = "/settings/editInfoPage";
      tinyMCE.triggerSave();

      function fntSucces({ msg }) {
        swal("Settings - Pages", msg, "success");
        setTimeout(() => window.location.reload(), 500);
      }
      ajax(url, "POST", this, fntSucces);
    });
  }

  if (document.querySelector("#tablePages")) {
    const urlData = "/settings/getPages";
    const columns = [
      { data: "idpage" },
      { data: "imagen", className: "text-center" },
      { data: "titulo", className: "text-center" },
      { data: "options" },
    ];
    tableClients = getDataTable("#tablePages", urlData, columns);
  }
});
