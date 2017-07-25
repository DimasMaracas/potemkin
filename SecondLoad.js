/**
 * Created by Дмитрий on 19.10.2016.
 */


//Повторное обращение в БД

var alpha = new XMLHttpRequest();

function CheckUpdate(){
    alpha.open("GET", "AfterInsert.php", true);
    //alpha.onreadystatechange = InsertData;
    alpha.send();
}


setInterval(CheckUpdate, 2000);


var betta = new XMLHttpRequest();
var before = 3;
var after = 0;


function PushToButton(){
    betta.open('GET', 'Json_database_news.json', true);
    betta.onreadystatechange = InsertData;
    betta.send();
}

after = before;


function InsertData(){

    function word ( number, wordsarray ) {
        return wordsarray[(number % 10 == 1 && number % 100 != 11 ? 0
            : number % 10 >= 2 && number % 10 <= 4 && (number % 100 < 10 || number % 100 >= 20) ? 1 : 2) ];
    }

        if ((betta.readyState == 4) && (betta.status == 200)) {

            var jsondata = JSON.parse(betta.responseText);

            if (jsondata.length - after > 0){

                var ptag = document.getElementById('ptag');
                //var button = document.createElement('btn');

                ptag.setAttribute('class', 'content_oncursor content_btn');
                ptag.setAttribute('onclick', 'btn()');
                //ptag.innerText = 'Показать ' + (jsondata.length - before).toString() + 'новых записи';
                ptag.innerText = 'Показать ' + (jsondata.length - before).toString()
                    + (word((jsondata.length - before), [' новую запись', ' новых записи', ' новых записей']));
                //ptag.appendChild(button);
            }
            after = jsondata.length;

            //newtext.innerHTML = betta.responseText;


        }
    //else {
    // document.getElementById('ptag').innerHTML = '<img src="load.gif" />';
    //}

}

function btn(){

    //before = jsondata.length;

    var jsondata = JSON.parse(betta.responseText);

    for (var index=before; index<jsondata.length; index++){

        var text = document.getElementById("container");
        var newtext = document.createElement('p');

        newtext.setAttribute('class', 'content');
        newtext.textContent = jsondata[index].text_news;
        text.insertBefore(newtext, text.children[0]);

    }
    before = jsondata.length;


    var ptag = document.getElementById('ptag');

    ptag.removeAttribute('class');
    ptag.removeAttribute('onclick');

    ptag.innerText = '';
}

setInterval(PushToButton, 3000);

