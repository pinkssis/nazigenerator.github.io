$(document).ready(function () {

    var token;

    function showPage(page) {
        $('.login').hide();
        $('.character').hide();
        $('.' + page).show();
    }

    function getCharacter() { //получить персонажа
        var data = { method: 'getCharacter', token: token };
        $.getJSON('index.php', data, function (result) {
            if (result) {
                $('#name').html('&nbsp' + result.name);
                $('#age').html('&nbsp' + result.age);
                $('#sex').html('&nbsp' + result.sex);
                $('#national').html('&nbsp' + result.national);
            }
        });
    }

    function addItemToCharacter(id) {
        var data = { method: 'addItemToCharacter', token: token, id_item: id };
        $.getJSON('index.php', data, function (result) {
            if (result) {
                getCharacterItems();
            }
        });
    }

    function delItemFromCharacter(id) {
        var data = { method: 'delItemFromCharacter', token: token, id_item: id };
        $.getJSON('index.php', data, function (result) {
            if (result) {
                getCharacterItems();
            }
        });
    }
	
	function delItemsByType(type) {
		var data = { method: 'delItemsFromCharacterByType', token: token, type: type };
        $.getJSON('index.php', data, function (result) {
            if (result) {
                getItems();
            }
        });
	}

	
    function getItems(idElem, type) { //получить шмотки ПО ТИПУ
        var data = { method: 'getItems', token: token, type: type  };
        $.getJSON('index.php', data, function (result) {
            if (result) {
                var list = "<div id='"+idElem+"_list' type='disc'></div>";
                $('#'+idElem).html(list);
                for (var i = 0; i < result.length; i++) {
                    (function (item) {
                        var img = document.createElement('img');
                        img.setAttribute('src', 'img\\' + item.name + '.png');
						img.setAttribute('class', idElem + type);
                        img.addEventListener('click', function () {
							$('.' + idElem + type).removeClass('selected');
							$(this).addClass('selected');
							
							delItemsByType(item.type); // удалить все шмотки у перса по типу
							addItemToCharacter(item.id); // добавить ОДНУ шмотку персу по id
                        });
                        $('#'+idElem+'_list').append(img);
                    })(result[i]);
                }
            }
        });
    }

    function getCharacterItems() { //получить шмотки персонажа
        var data = { method: 'getCharacterItems', token: token };
        $.getJSON('index.php', data, function (result) {
            if (result) {
                var list = "<ul id='listChar' type='disc'>" + "Список предметов персонажа (кликни, чтобы УДАЛИТЬ):" + "</ul>";
                $('#itemsCharacter').html(list);
                for (var i = 0; i < result.length; i++) {
                    (function (item) {
                        var li = document.createElement('li');
                        li.innerHTML = "<img src=\"img\\" + item.name + ".png\" >";
                        li.addEventListener('click', function () {
                            delItemFromCharacter(item.id);
                        });
                        $('#listChar').append(li);
                    })(result[i]);
                }
            }
        });
    }
	
	
	
	

    $('#login-button').on('click', function () { //вход в систему
        var login = $('#login').val();
        var password = $('#password').val();
        if (login && password) {
            $('#login').val('');
            $('#password').val('');
            var data = { method: 'login', login: login, password: password };
            $.getJSON('index.php', data, function (result) {
                if (result) {
                    token = result;
                    showPage('character');
                    getCharacter();
                    getCharacterItems();
                    getItems('items', 'sex');
					getItems('items1', 'nazi');
					getItems('items2', 'gender');
					getItems('items3', 'politic');
					getItems('items4', 'orintation');
					getItems('items5', 'religion');
                }
            });
        }
    });

    $('#logout-button').on('click', function () { //выход из системы
        var data = { method: 'logout', token: token };
        $.getJSON('index.php', data, function (result) {
            if (result) {
                token = null;
                showPage('login');
            }
        });
    });

    showPage('login');
});