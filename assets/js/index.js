const ENDPOINT =
  document.getElementById("navBar").dataset["base_url"] + "employee";
// const getJSONData = async () => {
//   const url = "./employee/getEmployees";
//   try {
//     const rawData = await fetch(url);
//     const data = await rawData.json();
//     return data;
//   } catch (error) {
//     alert("No database");
//   }
// };

$("#jsGrid").jsGrid({
  width: "100%",
  height: "600px",
  inserting: true,
  editing: true,
  sorting: true,
  paging: true,
  autoload: true,
  pageSize: 10,
  pageButtonCount: 5,
  deleteConfirm: "Do you really want to delete data?",
  controller: {
    // loadData: function () {
    //   var d = $.Deferred();
    //   return $.ajax({
    //     url: "./employee/getEmployees",
    //     type: "GET",
    //     dataType: "json",
    //     success: function (data) {
    //       return d.resolve(data);
    //     },
    //   });
    // },
    loadData: () =>
      fetch(ENDPOINT + "/getEmployees", {
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
    // updateItem: function (item) {
    //   var d = $.Deferred();
    //   console.log(item);
    //   return $.ajax({
    //     type: "PUT",
    //     url: "./src/library/employeeController.php",
    //     data: item,
    //     success: function (data) {
    //       return d.resolve(data);
    //     },
    //   });
    // },
    updateItem: (item) =>
      fetch(ENDPOINT + "/updateEmployeeJsGrid", {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest",
        },
        body: JSON.stringify(item),
      }).then((response) => response.json()),

    deleteItem: function (item) {
      return $.ajax({
        type: "DELETE",
        url: "./library/employeeController.php",
        data: item,
      }).done(function () {
        console.log("data deleted");
      });
    },
  },
  fields: [
    {
      name: "id",
      title: "ID",
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
      name: "lastName",
      title: "Last name",
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
      name: "gender",
      title: "Gender",
      type: "text",
      items: ["Male", "Female"],
      // items: [
      //   { Name: "", Id: "" },
      //   { Name: "Male", Id: "male" },
      //   { Name: "Female", Id: "female" },
      // ],
      // valueField: "Id",
      // textField: "Name",
      headercss: "table__header",
      css: "table__row",
      width: 50,
      validate: "required",
    },
    {
      name: "age",
      title: "Age",
      type: "number",
      headercss: "table__header",
      css: "table__row",
      width: 40,
      validate: function (value) {
        if (value > 0) {
          return true;
        }
      },
    },
    {
      name: "postalCode",
      title: "Postal code",
      type: "number",
      headercss: "table__header",
      css: "table__row",
      width: 40,
    },
    {
      name: "phoneNumber",
      title: "Phone number",
      type: "number",
      headercss: "table__header",
      css: "table__row",
      width: 60,
    },
    {
      name: "state",
      title: "State",
      type: "text",
      headercss: "table__header",
      css: "table__row",
      width: 50,
    },
    {
      name: "streetAddress",
      title: "Street address",
      type: "text",
      headercss: "table__header",
      css: "table__row",
      width: 40,
    },
    {
      name: "city",
      title: "City",
      type: "text",
      headercss: "table__header",
      css: "table__row",
      width: 60,
    },
    {
      type: "control",
      headercss: "table__header",
      css: "table__row",
      editButton: true,
      deleteButton: true,
      editButtonTooltip: "Edit",
      deleteButtonTooltip: "Delete",
      updateButtonTooltip: "Update",
      cancelEditButtonTooltip: "Cancel edit",
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
