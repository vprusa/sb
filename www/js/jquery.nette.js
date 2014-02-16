/**
 * AJAX Nette Framwork plugin for jQuery
 *
 * @copyright  Copyright (c) 2009 Jan Marek
 * @license    MIT
 * @link       http://nettephp.com/cs/extras/jquery-ajax
 * @version    0.1
 */

jQuery.extend({
    nette: {
        updateSnippet: function(id, html) {
            $("#" + id).html(html);
        },
        success: function(payload) {
            if (payload.redirect) {
                window.location.href = payload.redirect;
                return;
            }
            if (payload.snippets) {
                for (var i in payload.snippets) {
                    jQuery.nette.updateSnippet(i, payload.snippets[i]);
                }
            }
        },
        complete: function() {
            $('#ajax-spinner').css('visibility','hidden');
            revalidateAjaxHrefs();
        }
    }
});

jQuery.ajaxSetup({
    success: jQuery.nette.success,
    complete: jQuery.nette.complete,
    dataType: "json"
});

function revalidateAjaxHrefs() {
    $("a.ajax").each(function(index) {
        $(this).click(function(event) {
            //alert(this.href);
            $.get(this.href);
            $('#ajax-spinner').css('visibility','visible');
            return false;
        });
    });
}

$(function() {
    // apply AJAX unobtrusive way
    revalidateAjaxHrefs();
});