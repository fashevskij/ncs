
function checkFluency(element, color, product) {
    if (element.checked) {

        let recipe = document.querySelector("#recipe"),
            //текст + поиск
            data = "color=" + color + 
                        "&product=" + product +
                        "&packing=" + element.value +
                        "&btnOptions=1",
            //созадем обьект XMLHttpRequest();
            ajax = new XMLHttpRequest();
        //создаем запрос
        ajax.open("POST", "parts/recipe.php", false);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send(data); //отправляем запрос
        //обновляем блок с выпадающих цветов
        recipe.innerHTML = ajax.response;

        function checkedElement() {
            let packing = document.querySelectorAll("#packing");
            for (let i = 0; i < packing.length; i++) {
                packing[i].checked = false;
                if(packing[i].value == element.value) {
                    packing[i].checked = true;
                }
            }
        }
        checkedElement();
    }
}