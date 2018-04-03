# admin_panel

<a href="https://codeclimate.com/github/RouslanHam/admin_panel/maintainability"><img src="https://api.codeclimate.com/v1/badges/d3935bc5e3b93234ae88/maintainability" /></a>
<a href="https://codeclimate.com/github/RouslanHam/admin_panel/test_coverage"><img src="https://api.codeclimate.com/v1/badges/d3935bc5e3b93234ae88/test_coverage" /></a>

Использован PHP, верстка на bootstrap. <br>
Страницы: login, список пользователей (для администраторов - добавление новых), редактирование профиля (своего, администратор - любого+удаление).
<br>
<br>
index.php (index.phtml - шаблон)  - форма Login.<br>
userpanel.php - список пользователей. Сортировка по login, ФИО, роль(админ/юзер). Для администратора есть ссылка на добавление нового пользователя. На логинах - ссылка на просмотр профиля (editProfile.php).<br>
editProfile.php - форма изменения профиля (проверка на обязательные поля, проверка поля e-mail).<br>
<br>

config.php - параметры MySQL.<br>
checkSingIn.php - проверка логина и пароля с формы Login.<br>
saveChanges.php - сохранение профиля с формы editProfile.php.<br>
template.php - шаблонизатор для представления *.html файлов.
