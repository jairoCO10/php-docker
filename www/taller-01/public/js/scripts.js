const selectGenero = document.querySelector("#genero");
const selectPrograma = document.querySelector("#programa");
const tBodyContentPersons = document.querySelector("#tBodyContentPersons");

const validationsFormAndTable = (data) => {
  if (!data.personas) {
    Swal.fire("Aviso", "No Hay registros de personas.", "info");
    return;
  }

  if (!data.generos) {
    Swal.fire("Error!", "Erro al cargar los generos", "error");
    return;
  }

  if (!data.programas) {
    Swal.fire("Error!", "Erro al cargar los programas", "error");
    return;
  }
};

const getData = async () => {
  try {
    const response = await axios("/taller-01/api");
    return response;
  } catch (error) {
    console.log(error);
  }
};

const deletePerson = (id) => {
  try {
    const payload = {
      data: JSON.stringify({ id }),
    };
    Swal.fire({
      title: "Eliminar Persona",
      text: "Esta seguro que desea eliminar este registro ?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, eliminar!",
    }).then(async (result) => {
      if (result.isConfirmed) {
        const { data } = await axios.delete(
          "http://127.0.0.1/taller-01/api/",
          payload
        );
        if (data === "success") {
          Swal.fire("Eliminado!", "El registro ha sido eliminado.", "success");
          await renderData();
          actionsTable();
        } else {
          Swal.fire(
            "Error!",
            "Hubo un error al eliminar el registro.",
            "error"
          );
        }
      }
    });
  } catch (error) {
    console.log(error);
  }
};

const getPersonById = async (id) => {
  try {
    const payload = {
      data: JSON.stringify({ id }),
    };
    const { data } = await axios.post(
      "http://127.0.0.1/taller-01/api/",
      payload
    );
    console.log(data);
  } catch (error) {
    console.log(error);
  }
};

const renderData = async () => {
  const { data } = await getData();

  validationsFormAndTable(data);

  let generoHTML = '<option value="">Seleccione un valor</option>';
  data.generos.forEach((genero) => {
    generoHTML += `
              <option value="${genero.id}">${genero.genero}</option>
          `;
  });
  selectGenero.innerHTML = generoHTML;

  let programasHTML = '<option value="">Seleccione un valor</option>';
  data.programas.forEach((programa) => {
    programasHTML += `
              <option value="${programa.id}">${programa.programa}</option>
          `;
  });
  selectPrograma.innerHTML = programasHTML;

  let contentTablePersons = "";
  data?.personas.forEach((persona) => {
    const strPersona = JSON.stringify({ id: persona.identificacion });
    contentTablePersons += `
      <tr class="bg-white border-b">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          ${persona.identificacion}
          </th>
          <td class="px-6 py-4">
          ${persona.name}
          </td>
          <td class="px-6 py-4">
          ${persona.email}
          </td>
          <td class="px-6 py-4">
          ${persona.fecha_nacimiento}
          </td>
          <td class="px-6 py-4">
          ${persona.programa}
          </td>
          <td class="px-6 py-4">
          ${persona.genero}
          </td>
          <td class="px-6 py-4">
          ${persona.observacion}
          </td>
          <td class="px-6 py-4 flex flex-row">
          <button type="button" data-persona="${strPersona}" data-id="${persona.identificacion}" class="btnEdit  text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
              </svg>
          </button>
          <button type="button" data-id="${persona.identificacion}" class="btnDelete text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
              </svg>
          </button>
          </td>
      </tr>
      `;
  });
  tBodyContentPersons.innerHTML = contentTablePersons;
};

const actionsTable = () => {
  const btnsEdit = document.querySelectorAll(".btnEdit");
  const btnsDelete = document.querySelectorAll(".btnDelete");

  btnsDelete.forEach((btnDelete) => {
    btnDelete.addEventListener("click", () => {
      const id = btnDelete.getAttribute("data-id");
      deletePerson(id);
    });
  });

  btnsEdit.forEach((btnEdit) => {
    btnEdit.addEventListener("click", () => {
      const id = btnEdit.getAttribute("data-id");
      getPersonById(id);
    });
  });
};

window.addEventListener("load", async (event) => {
  console.log("page is fully loaded");
  await renderData();
  actionsTable();
});

function enviarDatos() {
  axios
    .post("/api", {
      identificacion: document.getElementById("identificacion").value,
      nombre: document.getElementById("nombres").value,
      email: document.getElementById("email").value,
      fecha_nac: document.getElementById("fecha_nac").value,
      genero: document.getElementById("genero").value,
      observaciones: document.getElementById("observaciones").value,
    })
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.log(error);
    });
}

btn = document.getElementById("btn-enviar");
btn.addEventListener("click", enviarDatos);
