$('table.data').DataTable(
    {
        "aaSorting": [],
        "stateSave": true
    }
);

(function ()
{
    var navTopPadding = parseInt($('nav.main_navigation').css('padding-top'), 10);
    var navBottomPadding = parseInt($('nav.main_navigation').css('padding-bottom'), 2);
    var navHeightToExclude = navTopPadding + navBottomPadding;
    $('nav.main_navigation').height($(window).height() - $('header.main').height() - navHeightToExclude - 1);

    var contentTopPadding = parseInt($('div.action_view').css('padding-top'), 10);
    var contentBottomPadding = parseInt($('div.action_view').css('padding-bottom'), 2);
    var contentHeightToExclude = contentTopPadding + contentBottomPadding;
    $('div.action_view').height($(window).height() - $('header.main').height() - contentHeightToExclude - 1);

    if (getCookie('menu_opened') == "true") {
        $('a.menu_switch').attr('data-menu-status', 'true');
        $('a.menu_switch').addClass('opened');
        $('nav.main_navigation').addClass('opened');
        $('div.action_view').addClass('collapsed')

    }
})();

$('a.menu_switch').click(function(evt)
{
    evt.preventDefault();
    if($(this).attr('data-menu-status') == 'false') {
        $(this).removeClass('no_animation');
        $('nav.main_navigation').removeClass('no_animation');
        $('div.action_view').removeClass('no_animation');
        $(this).attr('data-menu-status', 'true');
        $(this).addClass('opened');
        $('nav.main_navigation').addClass('opened');
        $('div.action_view').addClass('collapsed');
        if(getCookie('menu_opened') == "") {
            setCookie('menu_opened', true, 180, 'al-maktaba');
        }
    } else {
        $(this).attr('data-menu-status', 'false');
        $(this).removeClass('opened');
        $('nav.main_navigation').removeClass('opened');
        $('div.action_view').removeClass('collapsed');
        deleteCookie('menu_opened', 'al-maktaba');
    }
});

function closeResponsiveNav() {
    var ww = $(window).width();
    if (ww <= 1000) {
        $(this).attr('data-menu-status', 'false');
        $(this).removeClass('opened');
        $('nav.main_navigation').removeClass('opened');
        $('div.action_view').removeClass('collapsed');
        deleteCookie('menu_opened', 'al-maktaba');
    }
};

$('form.appForm input:not(.no_float)').on('focus', function()
{
    $(this).parent().find('label').addClass('floated');
}).on('blur', function()
{
    if($(this).val() == '') {
        $(this).parent().find('label').removeClass('floated');
    } else {

    }
});

$('div.radio_button, div.checkbox_button, label.radio span, label.checkbox span, a.language_switch.user').click(function(evt)
{
    evt.stopPropagation();
});

$('div.radio_button, div.checkbox_button, label.radio span, label.checkbox span, a.language_switch.language').click(function(evt)
{
     evt.stopPropagation();
});

// setTimeout(function()
// {
//     $('p.message').fadeOut();
// }, 5000);

(function()
{
    var closeMessageButtons = document.querySelectorAll('p.message a.closeBtn');
    for ( var i = 0, ii = closeMessageButtons.length; i < ii; i++ ) {
        closeMessageButtons[i].addEventListener('click', function (evt) {
            evt.preventDefault();
            this.parentNode.parentNode.removeChild(this.parentNode);
        }, false);
    }
})();

$(document).click(function()
{
    $('ul.user_menu').hide();
})

$('a.language_switch.user').click(function(evt)
{
    evt.preventDefault();
    $('ul.user_menu').toggle();
})

$(document).click(function()
{
    $('ul.language_menu').hide();
})

$('a.language_switch.language').click(function(evt)
{
    evt.preventDefault();
    $('ul.language_menu').toggle();
})

$('li.submenu > a').click(function()
{
    $('li.submenu > ul').not($(this).next()).slideUp();
    $('li.submenu').not($(this).parent()).removeClass('selected')
    $(this).next().slideToggle();
    if($(this).parent().hasClass('selected')) {
        $(this).parent().removeClass('selected')
    } else {
        $(this).parent().addClass('selected')
    }
});

(function()
{
    var loginNameField = document.querySelector('input[name=LoginName]');
    if(null !== loginNameField) {
        loginNameField.addEventListener('blur', function()
        {
            var req = new XMLHttpRequest();
            req.open('POST', 'http://al-maktaba/members/checkMemberExistsAjax');
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            req.onreadystatechange = function()
            {
                var iElem = document.createElement('i');
                var errorMsg = document.getElementById('error-message');
                if(req.readyState == req.DONE && req.status == 200) {
                    if(req.response == 1) {
                        iElem.className = 'fa fa-times error';
                        errorMsg.removeAttribute('style');
                    } else if(req.response == 2) {
                        iElem.className = 'fa fa-check success';
                        errorMsg.setAttribute('style', 'display: none');
                    }
                    var iElems = loginNameField.parentNode.childNodes;
                    for ( var i = 0, ii = iElems.length; i < ii; i++ )
                    {
                        if(iElems[i].nodeName.toLowerCase() == 'i') {
                            iElems[i].parentNode.removeChild(iElems[i]);
                        }
                    }
                    loginNameField.parentNode.appendChild(iElem);
                }
            }

            req.send("LoginName=" + this.value);
        }, false);
    }
})();

$(document).ready(function(){
    var maxField = 1000; //Input fields increment limitation
    var addButton = $('.add_attachment_button'); //Add button selector
    var wrapper = $('.add_attachment'); //Input field wrapper
    var fieldHTML = '<div class="input_wrapper_other padding border-bottom"><input class="border p-1" type="text" name="AttachmentName[]" id="AttachmentName"><input class="p-1" type="file" name="attachments[]" id="Attachment" multiple><a href="javascript:void(0);" class="remove_button"><i class="fa fa-trash"></a></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

// Scroll Nav for footer
$(window).scroll(function() {
    // if ($(window).scrollTop() + $(window).height() > $(document).height() - 0.1) {
    if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        // $(".main_navigation").css("position", "fixed");
        $(".main_navigation").css("top", "-200px");
    }
    else {
        // $(".main_navigation").css("position", "");
        $(".main_navigation").css("top", "");
    }
});

// bootstrap-select : selectpicker
// https://developer.snapappointments.com/bootstrap-select/examples/
$(document).ready(function() {   
    $('.selectpicker').selectpicker();
});
