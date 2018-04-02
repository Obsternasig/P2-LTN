// JavaScript Document

var $li = $('#menu li').click(function() {
    $li.removeClass('selected');
    $(this).addClass('selected');
});