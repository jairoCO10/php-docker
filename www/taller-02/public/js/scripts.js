const defaultModalS = document.querySelector("#defaultModalS");

// selects
const selectSalones = document.querySelector("#salone_add");
const selectTiposSalones = document.querySelector("#tipo_salon_add");

// tabla universidades
const tBodyContentUniversidad = document.querySelector(
  "#tBodyContentUniversidad"
);
const tBodyContentUniversidadSalones = document.querySelector(
  "#tBodyContentUniversidadSalones"
); // todo llenar

// crud - btns
const btnSend = document.querySelector("#btn-enviar");
const btnUpdated = document.querySelector("#btnUpdated");

const btnCreateRoom = document.querySelector("#btnCreateRoom");

// modals
const modalUpdate = document.querySelector("#sectionModal");
const modalUpdateSalones = document.querySelector("#sectionModalSalones");
const btnsCloseMod = document.querySelectorAll(".btnCloseMod");
const btnsCloseModSalon = document.querySelectorAll(".btnCloseModSalon");

// data select
let dataSelects = {
  tiposSalones: [],
};

let dataUniversityRoom = [];

const closeModalUpdate = () => {
  modalUpdate.classList.add("hidden");
};

const closeModalCargarSalon = () => {
  modalUpdateSalones.classList.add("hidden");
  selectSalones.removeEventListener("change", () => {}, { passive: true });
};

const validationsFormAndTable = (data) => {
  if (!data.universidades) {
    Swal.fire("Aviso", "No Hay registros de personas.", "info");
    return;
  }
};

const validationsSelectsForms = (data) => {
  if (!data.tiposSalones) {
    Swal.fire("Error!", "Erro al cargar los tipos de salones", "error");
    return;
  }

  if (!data.salones) {
    Swal.fire("Error!", "Erro al cargar los salones", "error");
    return;
  }
};

const renderData = async () => {
  const { data } = await getData();
  validationsFormAndTable(data);

  dataUniversityRoom = data.universidadesSalon;

  let contentTableUniversity = "";
  data?.universidades.forEach((universidad) => {
    contentTableUniversity += `
      <tr class="bg-white border-b">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          ${universidad.universidad}
          </th>
          <td class="px-6 py-4">
          ${universidad.cantidad_salon}
          </td>
          <td class="px-6 py-4 flex flex-row">
          <button type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal" data-id="${universidad.id}" class="btnEdit  text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
              </svg>
          </button>
          <button type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal" data-id="${universidad.id}" class="btnCargaSalones text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
            </svg>
          </button>
          <button type="button" data-id="${universidad.id}" class="btnDelete text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
              </svg>
          </button>
          </td>
      </tr>
      `;
  });
  tBodyContentUniversidad.innerHTML = contentTableUniversity;
  // fillDataModalSalon(data)
};

const renderTableUniversityRoom = (id) => {
  const tableUniversityRoomSelect = dataUniversityRoom.filter(
    (universityRoom) => Number(universityRoom.id) === Number(id)
  );
  let contentTableUniversityRoom = "";
  tableUniversityRoomSelect.forEach((universityRoom, idx) => {
    contentTableUniversityRoom += `
      <tr class="bg-white border-b">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          ${idx + 1}
          </th>
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          ${universityRoom.universidad}
          </th>
          <td class="px-6 py-4">
          ${universityRoom.salon}
          </td>
          <td class="px-6 py-4">
          ${universityRoom.tipo}
          </td>
          <td class="px-6 py-4 flex flex-row">
          <button type="button" data-id="${
            universityRoom.id_row
          }" class="btnDeleteRoom text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
              </svg>
          </button>
          </td>
      </tr>
      `;
  });
  tBodyContentUniversidadSalones.innerHTML = contentTableUniversityRoom;
};

const renderSelectsUpdate = (data) => {
  validationsSelectsForms(data);
  let salonesHTML = '<option value="">Seleccione un valor</option>';
  data.salones.forEach((salon) => {
    salonesHTML += `
              <option value="${salon.id}">${salon.salon}</option>
          `;
  });
  selectSalones.innerHTML = salonesHTML;
  dataSelects.tiposSalones = data.tiposSalones;
};

const getUniversidadById = async (id) => {
  try {
    const payload = {
      id,
      apiCall: "findById",
    };
    const { data } = await axios.post(
      "http://127.0.0.1/taller-02/api/",
      payload
    );
    return data;
  } catch (error) {
    console.log(error);
  }
};

const getUniversityRoomById = async (id) => {
  try {
    const payload = {
      id,
      apiCall: "findByIdRoom",
    };
    const { data } = await axios.post(
      "http://127.0.0.1/taller-02/api/",
      payload
    );
    console.log(data);
    return data;
  } catch (error) {
    console.log(error);
  }
};

const fillDataModal = (data) => {
  if (data.message === "success") {
    modalUpdate.classList.remove("hidden");
    document.querySelector("#universidad_show").textContent =
      data.universidad.id;
    document.getElementById("universidad_up").value =
      data.universidad.universidad;
    document.getElementById("cantidad_salones_up").value =
      data.universidad.cantidad_salon;
  }
};

const fillDataModalSalon = (data) => {
  modalUpdateSalones.classList.remove("hidden");
  document.querySelector("#universidad_show_id").textContent =
    data.universidad.universidad.id;
  document.querySelector("#universidad_show_u").textContent =
    data.universidad.universidad.universidad;
  document.querySelector("#universidad_show_cantidad").textContent =
    data.universidad.universidad.cantidad_salon;
  renderSelectsUpdate(data);
  renderTableUniversityRoom(data.universidad.universidad.id);
  actionsTable();
};

const actionsTable = () => {
  const btnsCargaSalones = document.querySelectorAll(".btnCargaSalones");
  const btnsEdit = document.querySelectorAll(".btnEdit");
  const btnsDelete = document.querySelectorAll(".btnDelete");
  const btnsDeleteRoom = document.querySelectorAll(".btnDeleteRoom");

  btnsCargaSalones.forEach((btnCargaSalon) => {
    btnCargaSalon.addEventListener("click", async () => {
      const id = btnCargaSalon.getAttribute("data-id");
      const data = await getUniversidadById(id);
      fillDataModalSalon(data);
    });
  });

  btnsEdit.forEach((btnEdit) => {
    btnEdit.addEventListener("click", async () => {
      const id = btnEdit.getAttribute("data-id");
      const data = await getUniversidadById(id);
      fillDataModal(data.universidad);
    });
  });

  btnsDelete.forEach((btnDelete) => {
    btnDelete.addEventListener("click", () => {
      const id = btnDelete.getAttribute("data-id");
      deleteUniversidad(id);
    });
  });

  btnsDeleteRoom.forEach((btnDelete) => {
    btnDelete.addEventListener("click", () => {
      console.log("click - delete");
      const id = btnDelete.getAttribute("data-id");
      deleteUniversidadSalon(id);
    });
  });
};

const getData = async () => {
  try {
    const response = await axios("/taller-02/api");
    return response;
  } catch (error) {
    console.log(error);
  }
};

const deleteUniversidad = (id) => {
  try {
    const payload = {
      data: JSON.stringify({ id, apiCall: "delete-universidad" }),
    };
    Swal.fire({
      title: "Eliminar Universidad",
      text: "Esta seguro que desea eliminar este registro ?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, eliminar!",
    }).then(async (result) => {
      if (result.isConfirmed) {
        const { data } = await axios.delete(
          "http://127.0.0.1/taller-02/api/",
          payload
        );
        console.log(data);
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

const deleteUniversidadSalon = (id) => {
  try {
    const payload = {
      data: JSON.stringify({ id, apiCall: "delete-universidad-salon" }),
    };
    Swal.fire({
      title: "Eliminar Salon",
      text: "Esta seguro que desea eliminar este registro ?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, eliminar!",
    }).then(async (result) => {
      if (result.isConfirmed) {
        const { data } = await axios.delete(
          "http://127.0.0.1/taller-02/api/",
          payload
        );
        console.log(data);
        if (data === "success") {
          Swal.fire("Eliminado!", "El registro ha sido eliminado.", "success");
          await renderData();
          renderTableUniversityRoom(
            document.querySelector("#universidad_show_id").textContent
          );
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

const sendData = async () => {
  try {
    const payload = {
      apiCall: "post",
      universidad: document.getElementById("universidad").value,
      cantidad_salon: document.getElementById("cantidad_salones").value,
    };

    if (!payload.universidad || !payload.cantidad_salon) {
      Swal.fire("Aviso", "Debe de llenar todos los campos.", "info");
      return;
    }
    const { data } = await axios.post(
      "http://127.0.0.1/taller-02/api/",
      payload
    );
    console.log(data);
    if (data === "success") {
      console.log("render-data");
      await renderData();
      actionsTable();
      Swal.fire(
        "Guardado!",
        "El registro ha sido guardado correctamente.",
        "success"
      );
      document.getElementById("universidad").value = "";
      document.getElementById("cantidad_salones").value = "";
    } else {
      Swal.fire("Error!", "Hubo un error al guardar el registro.", "error");
    }
  } catch (error) {
    console.log(error);
    Swal.fire("Error!", "Error al hacer la peticion", "error");
  }
};

const onUpdate = async () => {
  try {
    const payload = {
      id: document.querySelector("#universidad_show").textContent,
      universidad: document.getElementById("universidad_up").value,
      cantidad_salon: document.getElementById("cantidad_salones_up").value,
    };

    const { data } = await axios.put(
      "http://127.0.0.1/taller-02/api/",
      payload
    );
    if (data === "success") {
      await renderData();
      actionsTable();
      closeModalUpdate();
      Swal.fire(
        "Actualizado!",
        "El registro ha sido Actualizado correctamente.",
        "success"
      );
    } else {
      Swal.fire("Error!", "Hubo un error al eliminar el registro.", "error");
    }
  } catch (error) {
    console.log(error);
    Swal.fire("Error!", "Error al hacer la peticion", "error");
  }
};

const sendDataUniversityRoom = async () => {
  try {
    const maxRoom = Number(
      document.querySelector("#universidad_show_cantidad").textContent
    );

    const payload = {
      apiCall: "post-univerisity-room",
      id_universidad: Number(
        document.querySelector("#universidad_show_id").textContent
      ),
      id_salon: Number(selectSalones.value),
      id_tipo_salon: Number(selectTiposSalones.value),
    };

    if (!payload.id_salon || !payload.id_tipo_salon) {
      Swal.fire("Aviso", "Debe de llenar todos los campos.", "info");
      return;
    }

    const lengthUniversityRoom = dataUniversityRoom.filter(
      (ur) => Number(ur.id) === payload.id_universidad
    ).length;

    console.log({ lengthUniversityRoom, maxRoom });
    if (lengthUniversityRoom >= maxRoom) {
      Swal.fire(
        "Aviso - Tope de salones",
        "Ya no se pueden craer mas salones para esta universidad.",
        "info"
      );
      return;
    }

    const { data } = await axios.post(
      "http://127.0.0.1/taller-02/api/",
      payload
    );
    console.log(data);
    if (data === "success") {
      console.log("render-data");
      await renderData();
      actionsTable();
      renderTableUniversityRoom(payload.id_universidad);
      Swal.fire(
        "Guardado!",
        "El registro ha sido guardado correctamente.",
        "success"
      );
      selectSalones.value = "";
      selectTiposSalones.value = "";
    } else {
      Swal.fire("Error!", "Hubo un error al guardar el registro.", "error");
    }
  } catch (error) {
    console.log(error);
    Swal.fire("Error!", "Error al hacer la peticion", "error");
  }
};

// create
btnSend.addEventListener("click", () => {
  sendData();
});

// create - university room
btnCreateRoom.addEventListener("click", () => {
  sendDataUniversityRoom();
});

// change select - 1
selectSalones.addEventListener("change", (e) => {
  const optionSelectSalon = Number(e.target.value);
  const optionsForTypeRoom = {
    1: ["sencillo", "amoblado"],
    2: ["mediano", "grande"],
    3: ["sencillo", "amoblado", "mediano"],
  };
  const options = dataSelects.tiposSalones.filter((tipoSalon) => {
    // Si es [1] estandar el tipo debe ser sencillo o amoblado
    // Si es [2] auditorio, el tipo puede ser mediano o grande.
    // Si es [3] videconferencia, el tipo puede ser sencillo, amoblado o mediano
    return optionsForTypeRoom[optionSelectSalon].includes(tipoSalon.tipo);
  });

  let selectTiposSalonesHTML = '<option value="">Seleccione un valor</option>';
  options.forEach((tipoSalon) => {
    selectTiposSalonesHTML += `
              <option value="${tipoSalon.id}">${tipoSalon.tipo}</option>
          `;
  });
  selectTiposSalones.innerHTML = selectTiposSalonesHTML;
});

// close modals
btnsCloseMod.forEach((btnClose) => {
  btnClose.addEventListener("click", () => {
    closeModalUpdate();
  });
});

// close modals salones
btnsCloseModSalon.forEach((btnClose) => {
  btnClose.addEventListener("click", () => {
    closeModalCargarSalon();
  });
});

// update
btnUpdated.addEventListener("click", () => {
  onUpdate();
});

// update - university room

//load - init
window.addEventListener("load", async () => {
  await renderData();
  actionsTable();
});
