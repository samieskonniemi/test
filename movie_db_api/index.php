<?php

require('settings.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies API</title>

        <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="row">
        <div class="col">
            <p class="h1 d-flex justify-content-center">MOVIES API</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="directors">Choose a director:</label>
            <br>
            <select id="directors">
            <option value="Choose a director"></option>
            </select>
            <br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary" onclick="showDirInfo(url_directors)">Show director info</button>
            <br><br>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="actors">Choose an actor:</label>
            <br>
            <select id="actors">
            <option value="Choose an actor"></option>
            </select>
            <br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary" onclick="getActors(url_actors)">Show actor info</button>
            <br><br>
        </div>
    </div>

   
    </div>
    </div>
    <div class="row">
        <div class="col">
            <p id="info">
                <!-- <img src="https://www.thecocktaildb.com/images/ingredients/gin-Small.png"/> -->
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col">

            <H4>Enter director info:</H4>

            <form method="post">
                <label for="dir-fname">First name:</label>
                <input type="text" id="dir-fname" name="dir-fname"><br><br>
                <label for="dir-lname">Last name:</label>
                <input type="text" id="dir-lname" name="dir-lname"><br><br>
                <label for="dir-img">Select an image:</label>
                <input type="file" id="dir-img" name="dir-img"><br><br>
                <input type="button" id="dir-submit" value="Submit" onclick="insertDirector2(url_insert_director)">
              </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <H4 id="dir-info"></H4>
        </div>
    </div>
    <div class="row">
        <div class="col">

            <H4>Enter actor info:</H4>

            <form method="post">
                <label for="act-fname">First name:</label>
                <input type="text" id="act-fname" name="act-fname"><br><br>
                <label for="act-lname">Last name:</label>
                <input type="text" id="act-lname" name="act-lname"><br><br>
                <!-- <label for="act-img">Select an image:</label>
                <input type="file" id="act-img" name="act-img"><br><br> -->
                <input type="button" id="act-submit" value="Submit" onclick="insertActor(url_insert_actor)">
              </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <H4 id="act-info"></H4>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col">

            <H4>Enter movie info:</H4>

            <form method="post">
                <label for="mov-title">Movie title:</label>
                <input type="text" id="mov-title" name="mov-title"><br><br>
                <label for="dir-img">Select an image:</label>
                <input type="file" id="mov-img" name="mov-img"><br><br>
                <input type="button" id="mov-submit" value="Submit" onclick="insertMovie(url_insert_movie)">
              </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <H4 id="mov-info"></H4>
        </div>
    </div> -->

    <form enctype="multipart/form-data" method="post" name="fileinfo">
  <p>
    <label
      >Your email address:
      <input
        type="email"
        autocomplete="on"
        name="userid"
        placeholder="email"
        required
        size="32"
        maxlength="64" />
    </label>
  </p>
  <p>
    <label
      >Custom file label:
      <input type="text" name="filelabel" size="12" maxlength="32" />
    </label>
  </p>
  <p>
    <label
      >File to stash:
      <input type="file" name="file" required />
    </label>
  </p>
  <p>
    <input type="submit" value="Stash the file!" onclick="insertImg" />
  </p>
</form>
<div id="output"></div>


<script>

const url_directors = "https://localhost/movie_db_api/all_directors.php";
const url_actors = "https://localhost/movie_db_api/all_actors.php";
const url_movies = "https://localhost/movie_db_api/all_movies.php";
const url_insert_director = "https://localhost/movie_db_api/insert_director.php";
const url_insert_actor = "https://localhost/movie_db_api/insert_actor.php";
const url_insert_movie = "https://localhost/movie_db_api/insert_movie.php";

function insertImg(url_insert_director) {

const form = document.forms.namedItem("fileinfo");
form.addEventListener(
"submit",
(event) => {
const output = document.querySelector("#output");
const formData = new FormData(form);

formData.append("CustomField", "This is some extra data");

const request = new XMLHttpRequest();
request.open("POST", "stash.php", true);
request.onload = (progress) => {
  output.innerHTML =
    request.status === 200
      ? "Uploaded!"
      : `Error ${request.status} occurred when trying to upload your file.<br />`;
};

request.send(formData);
event.preventDefault();
},
false
);

}


async function getDirectors(url_directors) {

    let obj = await fetch(url_directors);
    var text = JSON.parse(await obj.text());
    let tulos;

    for (let x in text) {

    tulos += "<option value='" + text[x].dfname + " " + text[x].dlname + "'> " + text[x].dfname + " " + text[x].dlname + "</option>";
    // console.log("Drink name: " + text.drinks[x].strDrink);

    }
    document.getElementById("directors").innerHTML = (tulos);
}
getDirectors(url_directors);

async function getActors(url_actors) {

    let obj = await fetch(url_actors);
    var text = JSON.parse(await obj.text());
    let tulos;

    for (let x in text) {

    tulos += "<option value='" + text[x].afname + " " + text[x].alname + "'> " + text[x].afname + " " + text[x].alname + "</option>";
    // console.log("Drink name: " + text.drinks[x].strDrink);

    }
    document.getElementById("actors").innerHTML = (tulos);
}
getActors(url_actors);


function insertDirector(url_insert_director) {

let dir_fname = document.getElementById("dir-fname").value;
let dir_lname = document.getElementById("dir-lname").value;
const formData = new FormData();
const fileField = document.querySelector('input[type="file"]');

// formData.append('_method', 'PUT');
formData.append("dir-img", fileField.files[0]);

let director = {
    // "firstName": dir_fname,
    // "lastName": dir_lname,
    "img": formData
};

fetch("insert_director.php", {
    method: "post",
    mode: "same-origin",
    credentials: "same-origin",
    // headers: {
    //     'Accept': 'application/json',
    //     'Content-Type': 'application/json'
    // },

    // body: JSON.stringify(director)
    body: formData,
})
.then(function(response){
    return response.text();
    // return response.json();
})
.then(function(data){
    console.log(data);
})

}

function insertActor(url_insert_director) {

let act_fname = document.getElementById("act-fname").value;
let act_lname = document.getElementById("act-lname").value;

let actor = {
    "firstName": act_fname,
    "lastName": act_lname
};

fetch("insert_actor.php", {
    method: "post",
    mode: "same-origin",
    credentials: "same-origin",
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    },

    body: JSON.stringify(actor)
})
// .then(function(response){
//     return response.text();
//     // return response.json();
// })
// .then(function(data){
//     console.log(data);
// })

}

// let dir_fname = document.getElementById("dir-fname").value;
// let dir_lname = document.getElementById("dir-lname").value;
// document.getElementById("dir-info").innerHTML = (dir_fname + " " + dir_lname);


// function insertDirector(url_insert_director) {

//     const dir_obj = {

//         // username = "Mike"
//         firstName: dir_fname,
//         lastName: dir_lname
//     };

//     let dir_fname = document.getElementById("dir-fname").value;
//     let dir_lname = document.getElementById("dir-lname").value;

//     // fetch("http://localhost/movie_db_api/insert_director.php", {
//     fetch("insert_director.php", {
//         method: "post",
//         mode: "same-origin",
//         credentials: "same-origin",
//         headers: {
//             'Accept': 'application/json',
//             'Content-Type': 'application/json'
//         },

//         body: JSON.stringify(dir_obj)
//         // body: JSON.stringify({
//         //     firstName: dir_fname,
//         //     lastName: dir_lname
//         // })
//     })
//         .then((response) => response.json())
//         .then((data) => {
//             console.log("Success:", data);
//     })
//         .catch((error) => {
//             console.error("Error:", error);
//     });
// }






    // let dir_fname = document.getElementById("dir-fname").value;
    // let dir_lname = document.getElementById("dir-lname").value;

    // const dir_obj = {
    //     firstName: dir_fname,
    //     lastName: dir_lname
    // };

    // const formData = new FormData();

    // formData.append("firstName", dir_fname);
    // formData.append("lastName", dir_lname); 

    // await fetch("http://localhost/movie_db_api/insert_director.php", {
    //     method: 'POST', 
    //     // body: JSON.stringify(dir_obj),
    //     body: JSON.stringify({
    //         firstName: document.getElementById('dir-fname').value,
    //         lastName: document.getElementById('dir-lname').value
    //     }),
    //     headers: {
    //         "Content-Type": "application/json",
    //     },
        
    // })
    //     .then((response) => response.json())
    //     .then((dir_obj) => {
    //     console.log("Success:", dir_obj);
    //     })
    //     .catch((error) => {
    //     console.error("Error:", error);
    //     });

    // document.getElementById("dir-info").innerHTML = (dir_obj);

// }

</script>


</body>
</html>