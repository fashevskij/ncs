
//получаем форму окна авторизации
let formLogin = document.querySelector("#login-form"),
//получаем кнопку энтер в этом окне
btnLogin = document.querySelector("#btn-login"),
//получаем div форму навигационную панель контент
navBar = document.querySelector("#navbarSupportedContent");
//вешаем на кнопку событие при клике
btnLogin.addEventListener('click',function(){
    let ajax = new XMLHttpRequest();
	//создаем запрос
	ajax.open("GET", "modules/authorization.php", true);
	ajax.send(); //отправляем запрос
    //уберем форму авторизации
    formLogin.style.display = "none";
    //покажем нашу нав панель на экране
    navBar.style.display = "block";
    //повесим класс на навигационную панель для отображения стилей
    navBar.classList.add("collapse navbar-collapse");
});
