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
