/**
 * Created by Дмитрий on 01.06.2016.
 */


//заполняем страницу HTML при первом загрузке
var oAJAX = new XMLHttpRequest();

window.addEventListener('load', ReadJson(), false);


function ReadJson() {
    oAJAX.open("GET", "Json_database_news.json", true);   //false - синхронный запрос //true - асинхронный запрос
    oAJAX.onreadystatechange = AddData;
    oAJAX.send();
}

function AddData() {
    if ((oAJAX.readyState == 4) && (oAJAX.status == 200)) {
        if (JSON) {
           var  objectData = JSON.parse(oAJAX.responseText);
        }

        for (var i=0; i<objectData.length; i++) {

            var Output = document.getElementById("container");
            var content = document.createElement('p');

            content.setAttribute("class", "content");
            //content.textContent = 'Дата добавления: ' + objectData[i].daterecord;
            content.textContent = /*objectData[i].id_news + ". " + */objectData[i].text_news;
            //Output.appendChild(content);
            Output.insertBefore(content, Output.children[0]);

        }

    }

}


