const ENDPOINT = document.getElementById("navBar").dataset["base_url"] + "user";

$("#jsGridUser").jsGrid({
  autoload: true,
  width: "100%",
  height: "600px",
  inserting: true,
  editing: true,
  sorting: true,
  paging: true,
  pageSize: 10,
  pageButtonCount: 5,
  deleteConfirm: "Do you really want to delete data?",
  controller: {
    loadData: () =>
      fetch(ENDPOINT + "/getUsers", {
        headers: {
          "X-Requested-With": "XMLHttpRequest",
        },
      }).then((response) => response.json()),
    insertItem: (item) =>
      fetch(ENDPOINT + "/createEmployeeJsGrid", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest",
        },
        body: JSON.stringify(item),
      }).then((response) => response.json()),

    updateItem: (item) =>
      fetch(ENDPOINT + "/updateEmployeeJsGrid", {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest",
        },
        body: JSON.stringify(item),
      }).then((response) => response.json()),

    deleteItem: (item) =>
      fetch(ENDPOINT + "/deleteEmployee", {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest",
        },
        body: JSON.stringify(item),
      }).then((response) => response.json()),
  },
  fields: [
    {
      name: "userId",
      title: "UserID",
      type: "hidden",
      css: "hide",
    },
    {
      name: "name",
      title: "Name",
      type: "text",
      headercss: "table__header",
      css: "table__row",
      width: 50,
      validate: "required",
    },
    {
      name: "email",
      title: "Email",
      type: "text",
      headercss: "table__header",
      css: "table__row",
      width: 110,
      validate: "required",
    },
    {
      name: "role",
      title: "Role",
      type: "text",
      headercss: "table__header",
      css: "table__row",
      width: 40,
      validate: "required",
    },
  ],
  rowClick: (args) => {
    location.href = `${ENDPOINT}/showEmployeeById/${args.item.id}`;
  },
  onItemUpdated: function () {
    let toast = document.getElementById("update-toast");
    toast.classList.remove("toast");
    setTimeout(() => {
      toast.classList.add("toast");
    }, 2000);
  },
  onItemDeleted: function () {
    let toast = document.getElementById("delete-toast");
    toast.classList.remove("toast");
    setTimeout(() => {
      toast.classList.add("toast");
    }, 2000);
  },
});

$("#jsGrid").jsGrid("fieldOption", "id", "visible", false);

let toast = document.getElementById("toast");
if (toast) {
  setTimeout(() => {
    toast.remove();
  }, 3000);
}
