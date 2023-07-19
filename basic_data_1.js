console.log("Aa gaya JS mai basic_data_1");
$("#basic_data_1_form").submit(function (e) {
  // e.preventDefault();
  // e.stopPropagation();
  var form = $(this);
  var url = "files/assets/api/basic_data_1_api.php";
  var form_data = form.serialize();

  console.log(form_data);
  $.ajax({
    type: "POST",
    url: url,
    data: form_data,
    success: function (data) {
      console.log(data);
      var jsonData = JSON.parse(data);
      var return_data = jsonData.response;
      console.log(jsonData);
      if (
        return_data[0].status == "failed" &&
        return_data[0].reason == "basic_data_1_inserted_failed"
      ) {
        show_msg("copycode not inserted");
        //console.log("Category already exists")
      } else if (
        return_data[0].status == "success" &&
        return_data[0].reason == "basic_data_1_inserted_successfully"
      ) {
        show_msg("Basic Data 1 added");
        function_form("basic-data-2");
        window.location.href =
          "mainform.php?type=" +
          return_data[0].UrlType +
          "&ghjfgsd=" +
          return_data[0].encoded_form_id +
          "&bd2=y";
        // e.preventDefault();
      } else if (
        return_data[0].status == "failed" &&
        return_data[0].reason == "basic_data_1_update_failed"
      ) {
        show_msg("Basic Data not updated");
        // function_form('basic-data-2');
      } else if (
        return_data[0].status == "success" &&
        return_data[0].reason == "basic_data_1_updated_successfully"
      ) {
        show_msg("Basic Data 1 Updated");
        function_form("basic-data-2");
        window.location.href =
          "mainform.php?type=" +
          return_data[0].UrlType +
          "&ghjfgsd=" +
          return_data[0].encoded_form_id +
          "&bd2=y";
      }
    },
  });
});

function show_msg(msg) {
  var x = document.getElementById("snackbar");
  document.getElementById("snackbar").textContent = msg;
  x.className = "show";
  setTimeout(function () {
    x.className = x.className.replace("show", "");
  }, 3000);
}
