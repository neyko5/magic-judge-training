
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function() {
    $("table").DataTable();
    tinymce.init({
        selector: 'textarea.editor',
        plugins: ['link', 'image', 'lists'],
        toolbar: 'undo redo | styleselect | bold italic underline | bullist numlist | outdent indent | forecolor backcolor | link image | mtgbutton',
        menubar: false,
        height: 400,
        content_style: "span.mtgcard { color: red }",
        setup: function (editor) {
            editor.addButton('mtgbutton', {
                text: 'Card tag',
                tooltip: "Select card name and create a Magic card tag",
                icon: false,
                onclick: function () {
                    editor.insertContent('<span class="mtgcard">' + editor.selection.getContent({format : 'text'}) + '</span>');
                }
            });
        }
    });
    $("span.mtgcard").each(function(index) {
        let cardName = $(this).text();
        $(this).html("");
        $(this).append("<a target='_blank' href='http://gatherer.wizards.com/Pages/Card/Details.aspx?name=" + cardName +"'>" + cardName + "</a>");
        $(this).append("<div class='card-tooltip'><img src='http://gatherer.wizards.com/Handlers/Image.ashx?name=" + cardName + "&type=card'></div>");
    });
})