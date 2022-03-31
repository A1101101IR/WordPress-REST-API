function getToken() {
  var formdata = new FormData();
  formdata.append("username", "admin");
  formdata.append("password", "Password");

  var requestOptions = {
    method: "POST",
    body: formdata,
    redirect: "follow",
  };

  var token;
  fetch("http://wordpress.local/wp-json/jwt-auth/v1/token", requestOptions)
    .then((res) => res.json())
    .then((result) => (token = result.token))
    .then(() => localStorage.setItem("token", token))
    .catch((error) => console.log("error", error));
}
getToken();
