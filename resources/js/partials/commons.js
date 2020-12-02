// scroll reveal
window.scrollReveal = new scrollReveal();

// home hidden form
$('.dev-rgt a').on('click', function (e) {
    e.preventDefault;
    $(this).find('form').submit();
    return false;
})

/* Rederect after login */
if (top.location.pathname == '/user/home') {
    setTimeout(function () {
        window.location.href = "/";
    }, 1000);
}

/* Beds buttons */
$('#add_beds').on('click', function () {
    let n = $('#val_beds').text();
    if (n == 9) {
        $('#val_beds').text(n);
        $(this).attr('disabled', 'disabled');
    } else {
        n++;
        $('#val_beds').text(n)
        $('#remove_beds').removeAttr('disabled');
    }
});
$('#remove_beds').on('click', function () {
    let n = $('#val_beds').text();
    if (n == 1) {
        $('#val_beds').text(n)
        $(this).attr('disabled', 'disabled');
    } else {
        n--;
        $('#val_beds').text(n)
        $('#add_beds').removeAttr('disabled');
    }
});

/* Rooms buttons */
$('#add_rooms').on('click', function () {
    let n = $('#val_rooms').text();
    if (n == 9) {
        $('#val_rooms').text(n);
        $(this).attr('disabled', 'disabled');
    } else {
        n++;
        $('#val_rooms').text(n)
        $('#remove_rooms').removeAttr('disabled');
    }
});
$('#remove_rooms').on('click', function () {
    let n = $('#val_rooms').text();
    if (n == 1) {
        $('#val_rooms').text(n)
        $(this).attr('disabled', 'disabled');
    } else {
        n--;
        $('#val_rooms').text(n)
        $('#add_rooms').removeAttr('disabled');
    }
});

/* Baths buttons */
$('#add_baths').on('click', function () {
    let n = $('#val_baths').text();
    if (n == 9) {
        $('#val_baths').text(n);
        $(this).attr('disabled', 'disabled');
    } else {
        n++;
        $('#val_baths').text(n)
        $('#remove_baths').removeAttr('disabled');
    }
});
$('#remove_baths').on('click', function () {
    let n = $('#val_baths').text();
    if (n == 1) {
        $('#val_baths').text(n)
        $(this).attr('disabled', 'disabled');
    } else {
        n--;
        $('#val_baths').text(n)
        $('#add_baths').removeAttr('disabled');
    }
});

/* Promotion buttons */
$('#promotion-form').on('change', function () {
    let url = $('.form-check-input:checked').data('url');
    $(this).attr('action', url);
    $('#promotion-form button').removeAttr('disabled');
});


/* Navbar dropdown */
$('#user_menu').on('click', function () {
    if ($(".menu_tend").hasClass('my-flex')) {
        $('.menu_tend').hide();
        $(".menu_tend").removeClass('my-flex');
    } else {
        $(".menu_tend").addClass('my-flex');
        $('.menu_tend').show();
    }
})
const $usermenu = $('#user_menu')
$(document).mouseup(e => {
    if (!$usermenu.is(e.target) && $usermenu.has(e.target).length === 0){
        $('.menu_tend').hide();
        $(".menu_tend").removeClass('my-flex');
    }
});


/* Search filter dropdown */
$('.search-section.ssall #search').on('click', function () {
    if ($(".add_filter").hasClass('my-flex-filter')) {
        $(".add_filter").removeClass('my-flex-filter');
        $(".add_filter").addClass('my-display-none');

    } else {
        $(".add_filter").addClass('my-flex-filter');
        $(".add_filter").removeClass('my-display-none');
    }
})
const $menu = $('.add_filter.my-display-none')
$(document).mouseup(e => {
    if (!$menu.is(e.target) && $menu.has(e.target).length === 0){
        $(".add_filter").removeClass('my-flex-filter');
        $(".add_filter").addClass('my-display-none');
    }
});

/* Guest home */
$('#input-search-jumbo').keyup(function () {
    if ($('#input-search-jumbo').val() != "") {
        $('#btn-search-jumbo').removeClass('btn-search-jumbo');
        $('#btn-search-jumbo').addClass('searchbar-hover');
        $('#btn-search-jumbo').removeAttr('disabled');
    } else {
        $('#btn-search-jumbo').addClass('btn-search-jumbo');
        $('#btn-search-jumbo').removeClass('searchbar-hover');
        $('#btn-search-jumbo').attr('disabled');
    }
})

/* footer shuffle */
const parent = $("#by-random");
const names = parent.children();
while (names.length) {
    parent.append(names.splice(Math.floor(Math.random() * names.length), 1)[0]);
}




