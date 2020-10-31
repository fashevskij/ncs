//блок поиска текста без перезагрузки страницы

//получаем  форму поиска
let search = document.querySelector("#search"),
	//получаем поле для воода текста
    textSearch = search.querySelector("input"),
    //получаем Select выпадающий список цветов
    color = document.querySelector("#color");

//вешаем событие на поиск текста
search.onsubmit = function (event) {
	//отмена действия по умолчанию
	event.preventDefault();
	//текст + поиск
    let data = "search_color=" + textSearch.value + "&send=1";
	//созадем обьект XMLHttpRequest();
	let ajax = new XMLHttpRequest();
	//создаем запрос
	ajax.open("POST", "modules/search_color.php", false);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send(data); //отправляем запрос
	//обновляем блок с выпадающих цветов
    color.innerHTML = ajax.response;
};