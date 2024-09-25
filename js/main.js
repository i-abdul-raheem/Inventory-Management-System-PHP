function elem(id) {
  return document.getElementById(id);
}

function showToast(msg) {
  const toast = elem("toast");
  const body = elem("toast-body");
  body.innerHTML = msg;
  toast.classList.add("show");
  setTimeout(() => {
    toast.classList.remove("show");
  }, 3000);
}

const loginForm = elem("login-form");
if (loginForm) {
  loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const username = elem("username").value;
    const password = elem("password").value;
    const req = await fetch("/api/login", {
      method: "POST",
      body: JSON.stringify({ username, password }),
      headers: {
        "Content-Type": "application/json",
      },
    }).then((res) => res.json());
    if (req.user) {
      localStorage.setItem("user_id", req.user.id);
      localStorage.setItem("user_email", req.user.email);
      localStorage.setItem("user_username", req.user.username);
      window.location.href = "index.php";
    }
    elem("error").innerHTML = req.message;
  });
}

const addCategoryForm = elem("add-category-form");
if (addCategoryForm) {
  addCategoryForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const title = elem("categoryTitle").value;

    await fetch("/api/category", {
      method: "POST",
      body: JSON.stringify({ title }),
      headers: {
        "Content-Type": "application/json",
      },
    }).then((res) => res.json());

    window.location.reload();
  });
}

function setDeleteCategoryId(id) {
  document.getElementById("deleteCategoryId").value = id;
}

function setEditCategoryDetails(id, title) {
  document.getElementById("editCategoryId").value = id;
  document.getElementById("editCategoryTitle").value = title;
}

const deleteCategoryForm = elem("delete-category-form");
if (deleteCategoryForm) {
  deleteCategoryForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const id = elem("deleteCategoryId").value;

    const req = await fetch("/api/category/" + id, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
    }).then((res) => res.json());

    window.location.reload();
  });
}

const addCustomersForm = elem("add-customer-form");

if (addCustomersForm) {
  addCustomersForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(e.currentTarget);
    const formDataObj = {};

    // Convert FormData to a plain object
    formData.forEach((value, key) => {
      formDataObj[key] = value;
    });

    // Send the form data as JSON
    await fetch("/api/customer", {
      method: "POST",
      body: JSON.stringify({
        ...formDataObj,
        created_by: localStorage.getItem("user_id"),
      }), // Convert the object to JSON string
      headers: {
        "Content-Type": "application/json", // Set the correct header for JSON
      },
    });
    window.location.reload();
  });
}

async function setEditCustomerId(id) {
  const res = await fetch("/api/customer/" + id).then((res) => res.json());
  Object.keys(res).forEach((i) => {
    elem("customer-" + i).value = res[i];
  });
}
const editCustomersForm = elem("edit-customer-form");

if (editCustomersForm) {
  editCustomersForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(e.currentTarget);
    const formDataObj = {};

    // Convert FormData to a plain object
    formData.forEach((value, key) => {
      formDataObj[key] = value;
    });

    // Send the form data as JSON
    await fetch("/api/customer/" + elem("customer-id").value, {
      method: "PUT",
      body: JSON.stringify({
        ...formDataObj,
      }), // Convert the object to JSON string
      headers: {
        "Content-Type": "application/json", // Set the correct header for JSON
      },
    });
    window.location.reload();
  });
}

function setDeleteCustomerId(id) {
  elem("customerDeleteId").value = id;
}

const deleteCustomerForm = elem("delete-customer-form");
if (deleteCustomerForm) {
  deleteCustomerForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const id = elem("customerDeleteId").value;
    await fetch("/api/customer/" + id, { method: "DELETE" });
    window.location.reload();
  });
}

async function setCategories() {
  const res = await fetch("/api/category").then((res) => res.json());
  const target = elem("materialCategory");
  const target1 = elem("material-category");
  res.forEach((i) => {
    target.innerHTML += `<option value="${i["id"]}">${i["title"]}</option>`;
    target1.innerHTML += `<option value="${i["id"]}">${i["title"]}</option>`;
  });
}
const addMaterialForm = elem("add-material-form");
if (addMaterialForm) {
  setCategories();
  addMaterialForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(e.currentTarget);
    const formDataObj = {};

    // Convert FormData to a plain object
    formData.forEach((value, key) => {
      formDataObj[key] = value;
    });

    // Send the form data as JSON
    await fetch("/api/material", {
      method: "POST",
      body: JSON.stringify({
        ...formDataObj,
        created_by: localStorage.getItem("user_id"),
      }), // Convert the object to JSON string
      headers: {
        "Content-Type": "application/json", // Set the correct header for JSON
      },
    });
    window.location.reload();
  });
}

async function setEditMaterialId(id) {
  const res = await fetch("/api/material/" + id).then((res) => res.json());
  Object.keys(res).forEach((i) => {
    elem("material-" + i).value = res[i];
  });
}
const editMaterialsForm = elem("edit-material-form");

if (editMaterialsForm) {
  editMaterialsForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(e.currentTarget);
    const formDataObj = {};

    // Convert FormData to a plain object
    formData.forEach((value, key) => {
      formDataObj[key] = value;
    });

    // Send the form data as JSON
    await fetch("/api/material/" + elem("material-id").value, {
      method: "PUT",
      body: JSON.stringify({
        ...formDataObj,
      }), // Convert the object to JSON string
      headers: {
        "Content-Type": "application/json", // Set the correct header for JSON
      },
    });
    window.location.reload();
  });
}

function setDeleteMaterialId(id) {
  elem("materialDeleteId").value = id;
}

const deleteMaterialForm = elem("delete-material-form");
if (deleteMaterialForm) {
  deleteMaterialForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const id = elem("materialDeleteId").value;
    await fetch("/api/material/" + id, { method: "DELETE" });
    window.location.reload();
  });
}

const addVendorsForm = elem("add-vendor-form");

if (addVendorsForm) {
  addVendorsForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(e.currentTarget);
    const formDataObj = {};

    // Convert FormData to a plain object
    formData.forEach((value, key) => {
      formDataObj[key] = value;
    });

    // Send the form data as JSON
    await fetch("/api/vendor", {
      method: "POST",
      body: JSON.stringify({
        ...formDataObj,
        created_by: localStorage.getItem("user_id"),
      }), // Convert the object to JSON string
      headers: {
        "Content-Type": "application/json", // Set the correct header for JSON
      },
    });
    window.location.reload();
  });
}

async function setEditVendorId(id) {
  const res = await fetch("/api/vendor/" + id).then((res) => res.json());
  Object.keys(res).forEach((i) => {
    elem("vendor-" + i).value = res[i];
  });
}
const editVendorsForm = elem("edit-vendor-form");

if (editVendorsForm) {
  editVendorsForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(e.currentTarget);
    const formDataObj = {};

    // Convert FormData to a plain object
    formData.forEach((value, key) => {
      formDataObj[key] = value;
    });

    // Send the form data as JSON
    await fetch("/api/vendor/" + elem("vendor-id").value, {
      method: "PUT",
      body: JSON.stringify({
        ...formDataObj,
      }), // Convert the object to JSON string
      headers: {
        "Content-Type": "application/json", // Set the correct header for JSON
      },
    });
    window.location.reload();
  });
}

function setDeleteVendorId(id) {
  elem("vendorDeleteId").value = id;
}

const deleteVendorForm = elem("delete-vendor-form");
if (deleteVendorForm) {
  deleteVendorForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const id = elem("vendorDeleteId").value;
    await fetch("/api/vendor/" + id, { method: "DELETE" });
    window.location.reload();
  });
}

const updateUsername = elem("update-username");
if (updateUsername) {
  updateUsername.addEventListener("submit", async (e) => {
    e.preventDefault();
    const username = elem("username").value;
    const res = await fetch("/api/update-username", {
      method: "PATCH",
      body: JSON.stringify({ username }),
      headers: {
        "Content-Type": "application/json",
      },
    }).then((res) => res.json());
    elem("username-status").innerHTML = res.message;
    localStorage.setItem("username", username);
  });
}

const updateEmail = elem("update-email");
if (updateEmail) {
  updateEmail.addEventListener("submit", async (e) => {
    e.preventDefault();
    const email = elem("email").value;
    const res = await fetch("/api/update-email", {
      method: "PATCH",
      body: JSON.stringify({ email }),
      headers: {
        "Content-Type": "application/json",
      },
    }).then((res) => res.json());
    elem("email-status").innerHTML = res.message;
    localStorage.setItem("user_email", email);
  });
}

const updatePassword = elem("update-password");
if (updatePassword) {
  updatePassword.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(e.currentTarget);
    const formDataObj = {};
    formData.forEach((value, key) => {
      formDataObj[key] = value;
    });
    const res = await fetch("/api/update-password", {
      method: "PATCH",
      body: JSON.stringify(formDataObj),
      headers: {
        "Content-Type": "application/json",
      },
    }).then((res) => res.json());
    elem("password-status").innerHTML = res.message;
    localStorage.setItem("user_password", password);
  });
}

function populateCompany(e) {
  const target = elem("orderCompany");
  const getMembers = async (x) => {
    const res = await fetch("/api/" + x).then((res) => res.json());
    let temp = "<option value=''>Select company...</option>";
    res?.forEach((i) => {
      temp += `<option value='${i.id}'>${i.company_name}</option>`;
    });
    target.innerHTML = temp;
  };
  const emptyList = () => {
    target.innerHTML = "<option value=''>Select company...</option>";
  };
  const ordType = e?.value;
  if (ordType === "sell") {
    getMembers("customer");
  } else if (ordType === "purchase") {
    getMembers("vendor");
  } else {
    emptyList();
  }
}

const populateCategories = async () => {
  const target = elem("orderCategory");
  const res = await fetch("/api/category").then((res) => res.json());
  let temp = "<option value=''>Select category...</option>";
  res?.forEach((i) => {
    temp += `<option value='${i.id}'>${i.title}</option>`;
  });
  target.innerHTML = temp;
};

let allMaterials = [];
const getAllMaterials = async () => {
  const res = await fetch("/api/material").then((res) => res.json());
  allMaterials = [...res];
};
const orderCategory = elem("orderCategory");
if (orderCategory) {
  populateCategories();
  getAllMaterials();
}

const populateMaterial = async (e) => {
  const category = e.value;
  const target = elem("orderMaterial");
  const res = await fetch("/api/material-category/" + category).then((res) =>
    res.json()
  );
  let temp = "<option value=''>Select material...</option>";
  res?.forEach((i) => {
    temp += `<option value='${i.id}'>${i.title}</option>`;
  });
  target.innerHTML = temp;
};

const addOrderItems = [];

const getMaterialName = (id) => {
  const item = allMaterials.filter((i) => i.id == id)[0];
  return `${item?.title} (${item?.code})`;
};

const reRenderAddOrderList = () => {
  const target = elem("addOrderList");
  let temp = "";
  addOrderItems.forEach((i, index) => {
    temp += `
    <tr>
        <td>${index + 1}</td>
        <td>${getMaterialName(i?.material_id)}</td>
        <td>${i?.quantity}</td>
        <td>
            <button class="btn btn-danger" onclick="deleteAddByIndex(${index})"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
    `;
  });
  target.innerHTML = temp;
};

const addToAddOrder = () => {
  const material_id = elem("orderMaterial").value;
  const quantity = elem("orderQuantity").value;
  if (!material_id || material_id === "" || !quantity || quantity <= 0) {
    return false;
  }
  addOrderItems.push({ material_id, quantity });
  elem("orderQuantity").value = 0;
  reRenderAddOrderList();
};

const deleteAddByIndex = (index) => {
  addOrderItems.splice(index, 1);
  reRenderAddOrderList();
};

const placeAnOrder = async () => {
  const type = elem("orderType").value;
  const company = elem("orderCompany").value;
  if (!company || company == "") {
    return false;
  }
  let customer_id, vendor_id;
  if (type == "sell") {
    customer_id = company;
    vendor_id = 0;
  } else if (type == "purchase") {
    customer_id = 0;
    vendor_id = company;
  } else {
    return false;
  }
  if (addOrderItems.length < 1) {
    return false;
  }
  const req1 = await fetch("/api/order", {
    method: "POST",
    body: JSON.stringify({
      type,
      vendor_id,
      customer_id,
    }),
    headers: {
      "Content-Type": "application/json",
    },
  }).then((res) => res.json());
  if (!req1.order_id) {
    alert("Phase 1 failes");
    return false;
  }
  const order_id = req1?.order_id;
  await fetch("/api/order-item", {
    method: "POST",
    body: JSON.stringify({
      order_id,
      items: [...addOrderItems],
    }),
    headers: {
      "Content-Type": "application/json",
    },
  }).then((res) => res.json());
  window.location.href = "orders.php";
};

const placeOrderModalForm = elem("placeOrderModalForm");
if (placeOrderModalForm) {
  placeOrderModalForm.addEventListener("submit", (e) => {
    e.preventDefault();
    placeAnOrder();
  });
}

let editMaterialList = [];
function editItemQuantity(e, index) {
  const x = e.value;
  if (x >= 0) editMaterialList[index].quantity = parseInt(x);
  else e.value = 0;
}
function editItemReceived(e, index) {
  const x = e.value;
  if (x >= 0) editMaterialList[index].received = parseInt(x);
  else e.value = 0;
}
let disabledFields = false;
const reRenderEditOrderList = (disabled = false) => {
  const target = elem("editOrderList");
  let temp = "";
  editMaterialList.forEach((i, index) => {
    temp += `
    <tr>
        <td>${index + 1}</td>
        <td>${getMaterialName(i?.material_id)}</td>
        <td>${
          disabled
            ? i?.quantity
            : `<input type="number" value="${i?.quantity}" onchange="editItemQuantity(this, ${index})" />`
        }</td>
        <td>${
          disabled
            ? i?.received
            : `<input type="number" value="${i?.received}" onchange="editItemReceived(this, ${index})" />`
        }</td>
        <td>
            <button class="btn btn-danger" onclick="deleteEditByIndex(${index})" ${disabled ? "disabled='true'" : ""}"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
    `;
  });
  target.innerHTML = temp;
};

const deleteEditByIndex = (index) => {
  editMaterialList.splice(index, 1);
  reRenderEditOrderList(disabledFields);
};

const setOrderById = async () => {
  const id = elem("edit-id").value;
  const req = await fetch("/api/order/" + id).then((res) => res.json());
  const req1 = await fetch("/api/order-item/" + id).then((res) => res.json());
  editMaterialList = [...req1];
  elem("edit-orderType").value = req?.type;
  elem("edit-orderStatus").value = req?.status;
  if (req?.status == "cancelled" || req?.status == "delivered") {
    elem("updateOrderModal-id").remove();
    let elements = document.querySelectorAll("input, select, button");
    elements.forEach(function (element) {
      element.disabled = true;
    });
    disabledFields = true;
  }
  elem("edit-orderCompany").value = req?.company?.company_name;
  reRenderEditOrderList(disabledFields);
};

const editOrderPage = elem("edit-order-page");
if (editOrderPage) {
  getAllMaterials();
  setOrderById();
}

const addToEditOrder = (oid) => {
  const material_id = parseInt(elem("orderMaterial").value);
  const quantity = parseInt(elem("orderQuantity").value);
  if (!material_id || material_id === "" || !quantity || quantity <= 0) {
    return false;
  }
  editMaterialList.push({ material_id, quantity, received: 0, order_id: oid });
  elem("orderQuantity").value = 0;
  reRenderEditOrderList(disabledFields);
};

const updateOrderModalForm = elem("updateOrderModalForm");
if (updateOrderModalForm) {
  updateOrderModalForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    console.log(editMaterialList);
    const order_id = elem("edit-id").value;
    const status = elem("edit-orderStatus").value;
    const req1 = await fetch("/api/order/" + order_id, {
      method: "PUT",
      body: JSON.stringify({ status }),
      headers: {
        "Content-Type": "application/json",
      },
    }).then((res) => res.json());
    if (req1.status !== "success") {
      alert("Failed");
      return false;
    }
    const req2 = await fetch("/api/order-item", {
      method: "PUT",
      body: JSON.stringify({ items: editMaterialList }),
      headers: {
        "Content-Type": "application/json",
      },
    }).then((res) => res.json());
    if (req2.status !== "success") {
      alert("Failed");
      return false;
    }
    window.location.reload();
  });
}
