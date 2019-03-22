function getVilleByCP(cp){
  var cp_val = cp.value;
  var xhr = new XMLHttpRequest();

  var url = 'https://data.opendatasoft.com/api/records/1.0/search/?dataset=code-postal-code-insee-2015@public&q=code_postal:' + cp_val +'&facet=nom_reg&facet=code_dept&facet=nom_dept&facet=statut&facet=insee_com';
  xhr.onreadystatechange = function()
      {
          if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
          {
            var response = JSON.parse(xhr.responseText);
            villes = response.records;
            var select_ville = document.getElementById("ville");
            var departement = document.getElementById("departement");
            select_ville.innerHTML = '';
            villes.forEach(function(element){
              var opt = document.createElement('option');
              opt.value = element.fields.nom_de_la_commune;
              opt.innerHTML = element.fields.nom_de_la_commune;
              select_ville.appendChild(opt);
              departement.value = element.fields.nom_dept;
              departement.innerHTML = element.fields.nom_dept;
            });


          }
      }

  xhr.open('GET', url);
  xhr.send(null);
}


function updateListeJeu(user_id){
  var xhr = new XMLHttpRequest();
  var url = 'http://localhost/ajax/tp2/corrige/get-jeux-by-user.php';
  xhr.onreadystatechange = function()
      {
          if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
          {
            var response = JSON.parse(xhr.responseText);
            var select_jeu = document.getElementById("jeu_select");
            select_jeu.innerHTML = '';
            response.forEach(function(element){
              var opt = document.createElement('option');
              opt.value = element.id;
              opt.innerHTML = element.nom;
              select_jeu.appendChild(opt);
            });


          }
      }

  xhr.open('POST', url);

  var user_id_json = JSON.stringify({id_user: user_id.value});
  xhr.send(user_id_json);
}

window.onload = function() {
  if(document.getElementById("pret_jeu")){
    var form_pret = document.getElementById("pret_jeu");
    form_pret.addEventListener('submit',function(event){
      event.preventDefault();
      event.stopPropagation();
      sendPret(event.target);
    });
  }
  loadUser();
  loadMessages();
}

function sendPret(){
  var xhr = new XMLHttpRequest();
  var url = 'http://localhost/ajax/tp2/corrige/save-pret-jeu.php';
  xhr.onreadystatechange = function()
      {
          if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
          {
            var response = JSON.parse(xhr.responseText);
            var reponse_div = document.getElementById("response");
            reponse_div.innerText = response;
          }
      }

  xhr.open('POST', url);
  var user = document.getElementById("user_select").value;
  var jeu = document.getElementById("jeu_select").value;
  var user_id_json = JSON.stringify({id_user: user, id_jeu:jeu});
  xhr.send(user_id_json);
}

function loadUser(){
  var url = 'http://localhost/ajax/tp3/corrige/get-logged-users.php';
  $.ajax({
    url: url,
    context: document.body
  }).done(function( data ) {
    console.log(data);
    div_user = $('#users');
    div_user.empty();
    data.forEach(function(element){
      div_user.append(element.username + '<br />');
    })
  });

}

function loadMessages(){
  var url = 'http://localhost/ajax/tp3/corrige/index.php?actions=ListMessage';
  $.ajax({
    url: url,
    context: document.body
  }).done(function( data ) {
    console.log(data);
    div_user = $('#users');
    div_loading = $('#text');
    div_loading.empty();
    data.forEach(function(element){
      div_loading.append(element.user_id + '-' + element.text + '<br />');
    })
  });

}

function envoyerChat(){
  var message = $('#chat-text').val();
  $.ajax({
    type: "POST",
    url: "http://localhost/ajax/tp3/corrige/index.php?actions=SaveMessage",
    // The key needs to match your method's input parameter (case-sensitive).
    data: JSON.stringify({ message: message }),
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    success: function(data){
      loadMessages();
      alert(data);
    },
    failure: function(errMsg) {
        alert(errMsg);
    }
});
}
